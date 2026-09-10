<style>
.site-video-play {
    display: none !important;
}

/* Hide default browser video controls and play buttons */
video {
  pointer-events: none !important;
}
video::-webkit-media-controls,
video::-webkit-media-controls-play-button,
video::-webkit-media-controls-start-playback-button,
video::-webkit-media-controls-overlay-play-button,
video::-webkit-media-controls-panel,
video::-webkit-media-controls-enclosure {
  display: none !important;
  -webkit-appearance: none !important;
  opacity: 0 !important;
}

#shdr-root {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 100;
  display: grid;
  grid-template-columns: 1fr auto 1fr;
  align-items: center;
  gap: 16px;
  padding: 24px 56px;
  pointer-events: none;
}

#shdr-root .shdr-toggle {
  display: none;
  pointer-events: auto;
  justify-self: end;
  align-items: center;
  justify-content: center;
  width: 48px;
  height: 48px;
  border: 1px solid #d1d5db;
  border-radius: 14px;
  background: rgba(255, 255, 255, 0.96);
  color: #1f2937;
  font-size: 24px;
  line-height: 1;
  cursor: pointer;
}

body {
  overflow-x: hidden;
}

#shdr-root .header-logo {
  pointer-events: auto;
  justify-self: start;
  min-width: 0;
  transition: all 0.3s ease;
}

#shdr-root.shdr-scrolled .header-logo {
  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  pointer-events: none;
}

#shdr-root .header-logo img {
  display: block;
  height: 56px;
  max-width: 100%;
}

#shdr-root .nav-pill {
  pointer-events: auto;
  justify-self: center;
  background: rgba(255, 255, 255, 0.92);
  backdrop-filter: blur(20px);
  border: 1px solid #d1d5db;
  border-radius: 100px;
  padding: 0 16px;
  display: flex;
  max-width: min(1120px, 100%);
  overflow: visible;
}

#shdr-root .nav-links {
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  flex-wrap: wrap;
  width: 100%;
  margin: 0;
  padding: 0;
}

#shdr-root .nav-links > li {
  position: relative;
}

/* --- Nav text: black, normal weight by default, bold when active/hovered/current --- */
#shdr-root .nav-item {
  display: inline-flex !important;
  align-items: center;
  justify-content: center;
  padding: 13px 14px;
  gap: 6px;
  text-decoration: none !important;
  color: #000000 !important;
  font-weight: 400 !important;
  font-size: 12px;
  letter-spacing: 0.02em;
  white-space: nowrap;
  background: transparent;
  border: 0;
  cursor: pointer;
  -webkit-appearance: none;
  opacity: 1 !important;
  visibility: visible !important;
  transition: font-weight 0.15s ease;
}

#shdr-root .nav-item:hover,
#shdr-root .nav-item:focus-visible,
#shdr-root .nav-item.shdr-active,
#shdr-root .nav-links > li.shdr-open > .nav-item {
  color: #000000 !important;
  font-weight: 700 !important;
}

#shdr-root .nav-products {
  font-weight: 700 !important;
}

#shdr-root .nav-products:hover,
#shdr-root .nav-products:focus-visible,
#shdr-root .nav-products.shdr-active {
  font-weight: 900 !important;
}

#shdr-root .nav-item:focus-visible,
#shdr-root .dropdown a:focus-visible {
  outline: 2px solid #c2d500;
  outline-offset: 2px;
}

#shdr-root .shdr-caret {
  width: 0;
  height: 0;
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-top: 5px solid currentColor;
  transition: transform 0.2s ease;
}

#shdr-root .nav-links > li.shdr-has-dropdown:hover > .nav-item .shdr-caret,
#shdr-root .nav-links > li.shdr-has-dropdown:focus-within > .nav-item .shdr-caret,
#shdr-root .nav-links > li.shdr-open > .nav-item .shdr-caret {
  transform: rotate(180deg);
}

#shdr-root .dropdown {
  display: none;
  position: absolute;
  top: calc(100% + 12px);
  left: 0;
  min-width: 240px;
  padding: 12px !important;
  margin: 0;
  list-style: none;
  background: rgba(255, 255, 255, 0.98) !important;
  border: 1px solid rgba(229, 231, 235, 0.9);
  border-radius: 20px;
  box-shadow: 0 24px 60px rgba(0, 0, 0, 0.12);
  z-index: 2;
  height: auto !important;
  overflow: visible !important;
  opacity: 1 !important;
  visibility: visible !important;
}

#shdr-root .dropdown::before,
#shdr-root .sub-dropdown::before {
  content: '';
  position: absolute;
  pointer-events: auto;
}

#shdr-root .dropdown::before {
  left: 0;
  right: 0;
  top: -18px;
  height: 18px;
}

#shdr-root .sub-dropdown::before {
  top: -12px;
  left: -12px;
  width: 12px;
  height: calc(100% + 24px);
}

#shdr-root .nav-links > li:hover > .dropdown,
#shdr-root .nav-links > li:focus-within > .dropdown {
  display: block;
}

#shdr-root .nav-links > li.shdr-open > .dropdown {
  display: block !important;
}

#shdr-root .dropdown li {
  list-style: none;
  margin: 0;
  padding: 0;
}

/* --- Dropdown links: black, normal weight by default, bold when active/hovered/current --- */
#shdr-root .dropdown a,
#shdr-root .sub-dropdown a {
  display: block !important;
  padding: 10px 12px;
  border-radius: 12px;
  color: #000000 !important;
  text-decoration: none !important;
  font-size: 12px !important;
  font-weight: 400 !important;
  white-space: normal;
  opacity: 1 !important;
  visibility: visible !important;
  transition: font-weight 0.15s ease;
}

#shdr-root .dropdown a:hover,
#shdr-root .sub-dropdown a:hover,
#shdr-root .dropdown a.shdr-active,
#shdr-root .sub-dropdown a.shdr-active {
  background: rgba(0, 0, 0, 0.06);
  font-weight: 700 !important;
}

#shdr-root .shdr-subdropdown {
  display: none;
}

@media (max-width: 1180px) {
  #shdr-root {
    position: fixed !important;
    inset: 0 0 auto 0;
    padding: 16px 16px 0;
    grid-template-columns: 1fr;
    justify-items: center;
    gap: 12px;
  }

  #shdr-root .header-logo {
    justify-self: center;
    transition: all 0.3s ease;
    overflow: hidden;
  }

  #shdr-root.shdr-scrolled .header-logo {
    height: 0;
    margin: 0;
    opacity: 0;
  }

  #shdr-root .nav-pill {
    width: 100%;
    max-width: 100%;
    border-radius: 22px;
    overflow-x: auto;
    overflow-y: visible;
    justify-self: stretch;
    -webkit-overflow-scrolling: touch;
  }

  #shdr-root .nav-links {
    flex-wrap: nowrap;
    justify-content: flex-start;
    min-width: max-content;
  }

  #shdr-root .nav-links > li > a {
    padding: 14px 14px;
  }
}

@media (max-width: 768px) {
  #shdr-root {
    position: fixed !important;
    left: 0;
    right: 0;
    top: 0;
    padding: 10px 10px 0;
    grid-template-columns: 1fr auto;
    align-items: start;
  }

  #shdr-root .header-logo img {
    height: 34px;
  }

  #shdr-root .shdr-toggle {
    display: inline-flex;
  }

  #shdr-root .nav-pill {
    display: none;
    grid-column: 1 / -1;
    order: 3;
    margin-top: 8px;
    width: 100%;
    max-width: 100%;
    border-radius: 18px;
    padding: 4px 6px;
    max-height: calc(100vh - 92px);
    overflow-x: hidden !important;
    overflow-y: auto !important;
  }

  #shdr-root.shdr-menu-open .nav-pill {
    display: flex !important;
  }

  #shdr-root .nav-links {
    flex-direction: column;
    align-items: stretch;
    width: 100%;
    gap: 4px;
  }

  #shdr-root .nav-links > li {
    width: 100%;
  }

  #shdr-root .nav-item {
    font-size: 12px;
    padding: 10px 10px;
    width: 100%;
    justify-content: flex-start;
  }

  #shdr-root .dropdown {
    position: static !important;
    display: none;
    transform: none !important;
    margin-top: 6px;
    box-shadow: none;
    border-radius: 16px;
    min-width: 0;
    padding: 8px !important;
    width: 100%;
    max-height: 280px;
    overflow-x: hidden !important;
    overflow-y: auto !important;
    background: rgba(255, 255, 255, 0.98) !important;
  }

  #shdr-root .dropdown::before,
  #shdr-root .sub-dropdown::before {
    display: none;
  }

  #shdr-root .dropdown a,
  #shdr-root .sub-dropdown a {
    color: #000000 !important;
    font-size: 13px !important;
  }

  #shdr-root .dropdown a:hover,
  #shdr-root .sub-dropdown a:hover {
    background: rgba(0, 0, 0, 0.06);
  }

  #shdr-root .nav-links > li:hover > .dropdown,
  #shdr-root .nav-links > li:focus-within > .dropdown {
    display: none;
  }

  #shdr-root .nav-links > li.shdr-open > .dropdown {
    display: block !important;
  }

  #shdr-root .nav-links > li > a,
  #shdr-root .nav-links > li > button {
    width: 100%;
    justify-content: space-between;
  }
}
</style>

<header id="shdr-root">
  <a href="index.php" class="header-logo">
    <img src="samlogo.png" width="140" height="56" decoding="async" alt="sam" />
  </a>
  <button class="shdr-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false" data-shdr-mobile-toggle>☰</button>
  <nav class="nav-pill" aria-label="Primary navigation">
    <ul class="nav-links">
      <li class="shdr-has-dropdown">
        <button class="nav-item" type="button" data-shdr-toggle aria-expanded="false" aria-controls="shdr-treatment" aria-haspopup="true">
          sam&reg; TREATMENT <span class="shdr-caret" aria-hidden="true"></span>
        </button>
        <ul class="dropdown" id="shdr-treatment">
          <li><a href="sam-treatment.php">sam&reg; TREATMENT</a></li>
          <li><a href="sam-tech.php">sam&reg; TECHNOLOGY</a></li>
          <li><a href="https://samsport.com/" target="_blank" rel="noopener">order sam&reg;</a></li>
        </ul>
      </li>
      <li class="shdr-has-dropdown">
        <a class="nav-item nav-products" href="Products.php" data-shdr-toggle aria-expanded="false" aria-controls="shdr-products" aria-haspopup="true">
          sam&reg; PRODUCTS <span class="shdr-caret" aria-hidden="true"></span>
        </a>
        <ul class="dropdown" id="shdr-products">
          <li><a href="sam-x1-page.php">sam&reg; X1</a></li>
          <li><a href="sam-2-0.php">sam&reg; 2.0</a></li>
          <li><a href="sam-3-0.php">sam&reg; 3.0</a></li>
        </ul>
      </li>
      <li class="shdr-has-dropdown">
        <button class="nav-item" type="button" data-shdr-toggle aria-expanded="false" aria-controls="shdr-resources" aria-haspopup="true">
          PATIENT RESOURCES <span class="shdr-caret" aria-hidden="true"></span>
        </button>
        <ul class="dropdown" id="shdr-resources">
          <li><a href="faces-of-sam.php">FACES OF sam&reg;</a></li>
          <li><a href="injury-type.php">INJURY TYPE</a></li>
          <li><a href="instructional-videos.php">INSTRUCTIONAL VIDEOS</a></li>
          <li><a href="testimonials.php">TESTIMONIALS</a></li>
          <li><a href="FAQ.php">FAQ</a></li>
        </ul>
      </li>
      <li class="shdr-has-dropdown">
        <button class="nav-item" type="button" data-shdr-toggle aria-expanded="false" aria-controls="shdr-clinical" aria-haspopup="true">
          CLINICAL STUDIES <span class="shdr-caret" aria-hidden="true"></span>
        </button>
        <ul class="dropdown" id="shdr-clinical">
          <li><a href="clinical-studies.php">CLINICAL STUDIES</a></li>
          <li><a href="education-training.php">EDUCATION &amp; TRAINING</a></li>
        </ul>
      </li>
      <li><a class="nav-item" href="contact-us.php">CONTACT US</a></li>
    </ul>
  </nav>
</header>

<script>
  (() => {
    const mobile = window.matchMedia('(max-width: 768px)');
    const header = document.getElementById('shdr-root');
    const mobileToggle = document.querySelector('[data-shdr-mobile-toggle]');
    const items = [...document.querySelectorAll('.nav-links > li.shdr-has-dropdown')];
    const closeAll = () => items.forEach((li) => {
      li.classList.remove('shdr-open');
      const btn = li.querySelector('[data-shdr-toggle]');
      if (btn) btn.setAttribute('aria-expanded', 'false');
    });
    const closeMobileNav = () => {
      if (!header) return;
      header.classList.remove('shdr-menu-open');
      if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'false');
      closeAll();
    };

    mobileToggle?.addEventListener('click', (event) => {
      event.preventDefault();
      if (!mobile.matches) return;
      const open = header.classList.toggle('shdr-menu-open');
      mobileToggle.setAttribute('aria-expanded', String(open));
      if (!open) closeAll();
    });

    items.forEach((li) => {
      const btn = li.querySelector('[data-shdr-toggle]');
      if (!btn) return;
      btn.addEventListener('click', (e) => {
        if (!mobile.matches) return;
        const isLink = btn.tagName === 'A' && btn.getAttribute('href');
        const alreadyOpen = li.classList.contains('shdr-open');
        if (!alreadyOpen) {
          e.preventDefault();
        } else if (!isLink) {
          e.preventDefault();
        }
        const open = alreadyOpen ? (isLink ? false : li.classList.toggle('shdr-open')) : li.classList.toggle('shdr-open');
        btn.setAttribute('aria-expanded', String(open));
        items.filter((x) => x !== li).forEach((x) => {
          x.classList.remove('shdr-open');
          const otherBtn = x.querySelector('[data-shdr-toggle]');
          if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
        });
      });
    });
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.nav-pill') && !e.target.closest('[data-shdr-mobile-toggle]')) {
        closeMobileNav();
      }
    });
    window.addEventListener('resize', () => {
      if (!mobile.matches) closeMobileNav();
    });

    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.add('shdr-scrolled');
      } else {
        header.classList.remove('shdr-scrolled');
      }
    });

    // Mark the current page's nav link as active (bold) automatically
    const currentPath = window.location.pathname.split('/').pop() || 'index.php';
    document.querySelectorAll('#shdr-root .nav-item[href], #shdr-root .dropdown a, #shdr-root .sub-dropdown a').forEach((link) => {
      const href = (link.getAttribute('href') || '').split('/').pop();
      if (href && href === currentPath) {
        link.classList.add('shdr-active');
      }
    });
  })();

  // Ensure all videos play automatically, loop, and stay muted without controls
  const initVideos = () => {
    document.querySelectorAll('video').forEach((v) => {
      v.muted = true;
      v.loop = true;
      v.playsInline = true;
      v.removeAttribute('controls');
      const p = v.play();
      if (p && typeof p.catch === 'function') {
        p.catch(() => {});
      }
    });
  };
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initVideos);
  } else {
    initVideos();
  }
  window.addEventListener('load', initVideos);
</script>
