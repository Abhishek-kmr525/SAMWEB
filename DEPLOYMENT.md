# Git to cPanel deployment

The production repository checkout should live outside `public_html`. The
`deploy.sh` script pulls the configured Git branch and synchronizes the site
into `public_html` without publishing `.git`, deployment configuration, the
SQLite database, or the production application configuration.

## One-time cPanel setup

1. In cPanel Terminal, confirm that `git`, `rsync`, and `curl` are available.
2. Add an SSH deploy key to the Git repository and add the corresponding
   private key to the cPanel account.
3. Upload or clone this project into `/home/CPANEL_USER/repositories/samrecover`.
4. Copy `.deploy.env.example` to `.deploy.env` and fill in the repository URL,
   checkout directory, public directory, branch, and health-check URL.
5. Keep the existing production `includes/app-config.php` in `public_html`.
   For a new server, copy `includes/app-config.example.php` to that filename
   and enter the production values. The real file is intentionally excluded
   from Git and deployments because it contains environment-specific secrets.
6. Make the script executable: `chmod 700 deploy.sh`.
7. Run `./deploy.sh` from the private repository checkout.

## Normal workflow

1. Commit and push changes to the configured branch.
2. Open cPanel Terminal and run
   `/home/CPANEL_USER/repositories/samrecover/deploy.sh`.
3. The script performs a fast-forward-only pull, syncs website files, checks
   the live homepage, and prints the deployed commit ID.

The script uses a lock so two deployments cannot run at the same time. It does
not delete files from `public_html`; stale files can be reviewed and removed
separately when needed.

## Optional automatic deployment

After the manual flow is verified, add a cPanel Cron Job that runs the script
at the desired interval and appends output to a log outside `public_html`:

```text
/home/CPANEL_USER/repositories/samrecover/deploy.sh >> /home/CPANEL_USER/sam-deploy.log 2>&1
```

Do not expose the deployment script through a public PHP URL. A cPanel
Terminal or Cron Job run keeps repository credentials and deployment access
outside the website.
