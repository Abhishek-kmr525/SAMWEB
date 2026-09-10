<style>
  footer {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 18px;
    flex-wrap: wrap;
    padding: 34px 56px;
    background: #0b0f14;
    color: #fff;
    text-align: center;
  }

  .footer-logo img {
    height: 30px;
    display: block;
    opacity: 0.7;
    max-width: 100%;
  }

  .footer-copy {
    color: #d1d5db;
    font-size: 13px;
    line-height: 1.6;
  }

  .footer-links {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: nowrap;
    gap: 14px;
    margin-top: 12px;
  }

  .footer-social-group {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
  }

  .footer-links a {
    color: #d1d5db;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
  }

  .footer-links a:hover {
    color: #fff;
  }

  .footer-shell-divider {
    width: 1px;
    height: 16px;
    background: rgba(255, 255, 255, 0.2);
    margin-left: 24px;
  }

  .form-feedback-banner {
    display: none;
    margin: 0 0 20px;
    padding: 16px 18px;
    border-radius: 14px;
    font-size: 14px;
    line-height: 1.6;
    font-weight: 700;
  }

  .form-feedback-banner.is-visible {
    display: block;
  }

  .form-feedback-banner.is-success {
    background: #ecfdf5;
    color: #065f46;
    border: 1px solid #a7f3d0;
  }

  .form-feedback-banner.is-error {
    background: #fef2f2;
    color: #991b1b;
    border: 1px solid #fecaca;
  }

  [id="contact-form"] {
    scroll-margin-top: 180px;
  }

  .thankyou-overlay .ty-note {
    flex-wrap: wrap;
    justify-content: center;
    text-align: center;
    width: min(100%, 840px);
  }

  .site-video-trigger {
    position: relative;
    cursor: pointer;
  }

  .site-video-trigger iframe {
    pointer-events: none;
  }

  .site-video-play {
    position: absolute;
    inset: 50% auto auto 50%;
    transform: translate(-50%, -50%);
    width: 72px;
    height: 72px;
    border: 0;
    border-radius: 999px;
    background: rgba(11, 15, 20, 0.82);
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.28);
    cursor: pointer;
    transition: transform 0.2s ease, background 0.2s ease;
    z-index: 3;
  }

  .site-video-play:hover {
    transform: translate(-50%, -50%) scale(1.05);
    background: rgba(11, 15, 20, 0.94);
  }

  .site-video-play::before {
    content: "";
    margin-left: 4px;
    border-top: 12px solid transparent;
    border-bottom: 12px solid transparent;
    border-left: 18px solid currentColor;
  }

  .site-video-modal {
    position: fixed;
    inset: 0;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 24px;
    background: rgba(3, 7, 18, 0.82);
    backdrop-filter: blur(10px);
    z-index: 1000;
  }

  .site-video-modal.is-open {
    display: flex;
  }

  .site-video-dialog {
    position: relative;
    width: min(1100px, 100%);
    max-height: min(85vh, 900px);
    background: #000;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 30px 100px rgba(0, 0, 0, 0.42);
  }

  .site-video-close {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 46px;
    height: 46px;
    border: 0;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.92);
    color: #111827;
    font-size: 30px;
    line-height: 1;
    display: grid;
    place-items: center;
    cursor: pointer;
    z-index: 2;
  }

  .site-video-content {
    width: 100%;
    aspect-ratio: 16 / 9;
    background: #000;
  }

  .site-video-content iframe,
  .site-video-content video {
    width: 100%;
    height: 100%;
    border: 0;
    display: block;
    background: #000;
  }

  @media (max-width: 768px) {
    footer {
      padding: 24px 16px;
      flex-direction: column;
      align-items: center;
      gap: 12px;
    }

    .footer-copy {
      font-size: 12px;
    }

    .footer-links {
      gap: 10px;
    }

    .footer-shell-divider {
      display: none;
    }

    .site-video-play {
      width: 60px;
      height: 60px;
    }

    .site-video-play::before {
      border-top-width: 10px;
      border-bottom-width: 10px;
      border-left-width: 16px;
    }

    .site-video-modal {
      padding: 16px;
    }

    .site-video-dialog {
      border-radius: 18px;
    }
  }
</style>
<footer>
    <div class="footer-logo"><img src="samlogo.png" width="140" height="56" loading="lazy" decoding="async"
        alt="sam&reg;" /></div>
    <div class="footer-copy">&copy; 2026 sam&reg; Products, ZetrOZ Systems LLC | Trumbull, CT | 888-202-9831</div>
    <div class="footer-links">
      <a href="clinical-studies.php">Clinical Studies</a>
      <a href="contact-us.php">Contact</a>

      <div class="footer-shell-divider"></div>
      <div class="footer-social-group">
        <a href="https://www.facebook.com/samrecover/about/" target="_blank" rel="noopener" aria-label="Facebook"
          style="display: flex; align-items: center;"><svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.312h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
          </svg></a>
        <a href="https://x.com/samrecover" target="_blank" rel="noopener" aria-label="X"
          style="display: flex; align-items: center;"><svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.004 4.076H5.036z" />
          </svg></a>
        <a href="https://www.linkedin.com/showcase/sam%C2%AE-recover/" target="_blank" rel="noopener"
          aria-label="LinkedIn" style="display: flex; align-items: center;"><svg width="18" height="18"
            fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
          </svg></a>
        <a href="https://www.instagram.com/sam.recover/" target="_blank" rel="noopener" aria-label="Instagram"
          style="display: flex; align-items: center;"><svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
          </svg></a>
      </div>
    </div>
  </footer>
  <div class="site-video-modal" id="siteVideoModal" aria-hidden="true">
    <div class="site-video-dialog" role="dialog" aria-modal="true" aria-label="Video player">
      <button class="site-video-close" type="button" aria-label="Close video" data-site-video-close>&times;</button>
      <div class="site-video-content" id="siteVideoContent"></div>
    </div>
  </div>
  <script src="assets/site-enhancements.js?v=20260624-1"></script>
