# SAM Recover GitHub to cPanel Deployment Handover

## Purpose

This document describes the intended deployment workflow for the SAM Recover
website:

1. A developer commits and pushes approved changes to GitHub.
2. A private cPanel server script pulls the selected Git branch.
3. The script synchronizes the website files into `public_html`.
4. The script checks that the live homepage is reachable.

The repository checkout and all deployment credentials must remain outside the
public website directory.

## Current Repository Facts

| Item | Current value or status |
| --- | --- |
| GitHub repository | `git@github.com:Abhishek-kmr525/SAMWEB.git` |
| Deployment branch | `main` |
| Server deployment script | `deploy.sh` |
| Deployment configuration template | `.deploy.env.example` |
| Production web root | `/home/CPANEL_USER/public_html` |
| Private server checkout | `/home/CPANEL_USER/repositories/samrecover` |
| Production health check | `https://samrecover.com/` |
| FTP deployment | Disabled. `deploy_ftp.py` intentionally exits. |
| Public deploy endpoint | Disabled. `deploy_online.php` intentionally returns HTTP 404. |

The intended trigger is a private cPanel Terminal/SSH command or a protected
server automation job. Do not expose `deploy.sh`, repository credentials, or a
Git pull endpoint through a public web URL.

## Required Access and Credentials

Do not put actual passwords, access tokens, SSH private keys, or application
secrets in this document, in Git, or in email. Share them separately through a
password manager or another approved secure channel.

| Required item | Used by | Storage location | Notes |
| --- | --- | --- | --- |
| GitHub repository write access | Developer who pushes code | Developer's GitHub account | Required to push to `main`. |
| Developer SSH private key | Developer's computer | `~/.ssh/`, never in Git | Used for `git push` to the GitHub SSH URL. |
| cPanel SSH/Terminal access | Deployment operator | cPanel account / SSH account | Required to run the private deployment script. |
| Read-only GitHub deploy key | cPanel server | cPanel `~/.ssh/`, never in Git | Add the matching public key to GitHub repository Deploy Keys with read-only access. |
| `.deploy.env` | cPanel server | Private repository checkout, never in Git | Defines the repository URL, paths, branch, and health-check URL. |
| `includes/app-config.php` | Production website | `public_html/includes/`, never in Git | Production-only application configuration. Keep the existing file during deployment. |

### Current Local GitHub Access Status

The local repository is configured to use an SSH key named
`id_ed25519_samweb`. No GitHub personal access token is stored in this project.
At the time of this handover, a non-interactive GitHub SSH authentication test
was rejected. Before the next local push, restore that key's access to the
GitHub account/repository or create and authorize a replacement SSH key.

This is a GitHub authorization issue, not a reason to copy a private key or
token into the repository.

## One-Time cPanel Setup

Run these steps through cPanel Terminal or an SSH session for the hosting
account. Replace `CPANEL_USER` with the real cPanel username.

### 1. Verify server tools

```bash
git --version
rsync --version
curl --version
```

### 2. Create a dedicated cPanel deploy key

```bash
mkdir -p /home/CPANEL_USER/.ssh
chmod 700 /home/CPANEL_USER/.ssh
ssh-keygen -t ed25519 -f /home/CPANEL_USER/.ssh/samrecover_deploy -C "samrecover-cpanel-deploy"
```

Copy the contents of:

```text
/home/CPANEL_USER/.ssh/samrecover_deploy.pub
```

In GitHub, open the `SAMWEB` repository and add that public key under:

```text
Settings -> Deploy keys -> Add deploy key
```

Use read-only access. The cPanel server only needs to pull code; it must not be
allowed to push to GitHub.

### 3. Configure SSH for GitHub on cPanel

Create `/home/CPANEL_USER/.ssh/config` with this content:

```text
Host github.com
  HostName github.com
  User git
  IdentityFile /home/CPANEL_USER/.ssh/samrecover_deploy
  IdentitiesOnly yes
```

Then apply permissions and test:

```bash
chmod 600 /home/CPANEL_USER/.ssh/config
ssh -T git@github.com
```

GitHub should confirm that authentication succeeded. GitHub does not provide a
shell session; that message is expected.

### 4. Create the private repository checkout

```bash
mkdir -p /home/CPANEL_USER/repositories
git clone --branch main --single-branch git@github.com:Abhishek-kmr525/SAMWEB.git /home/CPANEL_USER/repositories/samrecover
```

Do not clone the repository directly inside `public_html`.

### 5. Create the deployment configuration

```bash
cd /home/CPANEL_USER/repositories/samrecover
cp .deploy.env.example .deploy.env
chmod 600 .deploy.env
```

Set the values in `.deploy.env` as follows:

```text
SAM_REPO_URL=git@github.com:Abhishek-kmr525/SAMWEB.git
SAM_REPO_DIR=/home/CPANEL_USER/repositories/samrecover
SAM_PUBLIC_DIR=/home/CPANEL_USER/public_html
SAM_BRANCH=main
SAM_HEALTHCHECK_URL=https://samrecover.com/
```

### 6. Preserve production-only settings

Ensure this file exists in the production web root before deployment:

```text
/home/CPANEL_USER/public_html/includes/app-config.php
```

It is intentionally excluded from Git and from `rsync`. Do not overwrite it
with local development values.

### 7. Activate and test the script

```bash
cd /home/CPANEL_USER/repositories/samrecover
chmod 700 deploy.sh
./deploy.sh
```

Expected result:

- The script acquires a deployment lock.
- It performs `git pull --ff-only origin main`.
- It synchronizes the repository to `public_html` while excluding secrets and
  deployment tooling.
- It runs the health check against `https://samrecover.com/`.
- It prints the deployed Git commit.

## Normal Deployment Workflow

### Developer workstation

```bash
git status
git add <approved-files>
git commit -m "Describe the approved change"
git push origin main
```

Before the first push from a workstation, verify GitHub SSH authorization:

```bash
ssh -T git@github.com
git ls-remote origin
```

### cPanel server

```bash
/home/CPANEL_USER/repositories/samrecover/deploy.sh
```

### Production verification

```bash
curl -fsSIL https://samrecover.com/
curl -fsS https://samrecover.com/robots.txt
```

Confirm that the homepage returns a successful HTTP response and that the new
content or asset is present on the live site.

## Optional Scheduled Deployment

After a successful manual deployment has been verified, cPanel Cron Jobs can
run the private script at an agreed interval:

```text
/home/CPANEL_USER/repositories/samrecover/deploy.sh >> /home/CPANEL_USER/sam-deploy.log 2>&1
```

Use a schedule appropriate for the team. Manual deployment is safer when each
release needs a visual approval before going live.

## Security Rules

- Never commit `.deploy.env`, `includes/app-config.php`, SSH private keys, or
  GitHub tokens.
- Never send private keys or tokens by ordinary email or chat.
- Use a separate read-only GitHub deploy key for cPanel; do not reuse a
  developer's personal key on the server.
- Keep the repository checkout outside `public_html`.
- Do not create a public PHP deployment URL.
- Use `git pull --ff-only` so the server cannot silently create merge commits.
- Review and rotate any credential that may already have been shared in an
  unsafe channel.

## Current Verification Required Before Handover Is Complete

The repository contains the deployment script and configuration template, but
the following must be verified directly in cPanel before calling the setup
fully operational:

1. The cPanel SSH deploy key is registered in GitHub and can pull the
   repository.
2. The real `.deploy.env` exists on cPanel with the correct username and paths.
3. `deploy.sh` runs successfully from the private server checkout.
4. The expected production `app-config.php` is preserved after deployment.
5. The health check returns success and the deployed commit matches GitHub.

## Support Checklist

If a push or deployment fails, collect only non-secret information:

```bash
git status
git remote -v
ssh -T git@github.com
git -C /home/CPANEL_USER/repositories/samrecover status
tail -100 /home/CPANEL_USER/sam-deploy.log
```

Do not paste private keys, tokens, `.deploy.env`, or `app-config.php` into
support tickets or email threads.
