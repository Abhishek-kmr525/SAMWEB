(function () {
  const STORAGE_KEY = "SAM_HEADER_CONFIG_V1";
  const DEFAULT_CONFIG = {
    logoUrl: "/samlogo.png",
    logoAlt: "sam",
    logoHref: "index.php",
    footerCopyHtml: "&copy; 2026 sam&reg; Products, ZetrOZ Systems LLC | Trumbull, CT | 888-202-9831",
    footerLinks: [
      { label: "Clinical Studies", href: "clinical-studies.php" },
      { label: "Contact", href: "contact-us.php" }
    ],
    menu: [
      {
        label: "sam® TREATMENT",
        href: "sam-treatment.php",
        children: [
          { label: "sam® Technology", href: "sam-tech.php" },
          { label: "Order sam®", href: "https://samsport.com/" }
        ]
      },
      {
        label: "sam® PRODUCTS",
        href: "Products.php",
        children: [
          { label: "sam® 3.0", href: "sam-3-0.php" },
          { label: "sam® 2.0", href: "sam-2-0.php" },
          { label: "sam® X1", href: "sam-x1-page.php" }
        ]
      },
      {
        label: "PATIENT RESOURCES",
        href: "patient-resources.php",
        children: [
          { label: "Faces of sam®", href: "faces-of-sam.php" },
          { label: "Injury Type", href: "injury-type.php" },
          { label: "Instructional Videos", href: "instructional-videos.php" },
          { label: "Testimonials", href: "testimonials.php" },
          { label: "FAQ", href: "FAQ.php" }
        ]
      },
      {
        label: "CLINICAL STUDIES",
        href: "clinical-studies.php",
        children: [
          { label: "Education & Training", href: "education-training.php" }
        ]
      },
      { label: "CONTACT US", href: "contact-us.php" }
    ]
  };

  function injectGlobalStyles() {
    if (document.getElementById("sam-header-config-styles")) return;
    const style = document.createElement("style");
    style.id = "sam-header-config-styles";
    style.textContent = [
      /* nav-label-only: looks like a nav link but is not clickable */
      ".nav-label-only {",
      "  color: var(--gray-700, #374151);",
      "  font-size: 13px;",
      "  font-weight: 600;",
      "  padding: 16px 20px;",
      "  display: block;",
      "  letter-spacing: 0.05em;",
      "  text-transform: uppercase;",
      "  cursor: default;",
      "  user-select: none;",
      "}",
      /* Keep dropdown visible on hover of parent li even with span */
      ".nav-links > li:hover > .dropdown,",
      ".nav-links > li:focus-within > .dropdown {",
      "  opacity: 1 !important;",
      "  visibility: visible !important;",
      "  transform: translateX(-50%) translateY(0) !important;",
      "}",
      ".nav-links > li.is-open > .dropdown,",
      ".nav-links > li.shdr-open > .dropdown {",
      "  opacity: 1 !important;",
      "  visibility: visible !important;",
      "  transform: translateX(-50%) translateY(0) !important;",
      "}",
      ".nav-links > li > .dropdown::before,",
      ".nav-links > li > .dropdown::after,",
      ".nav-links > li > .sub-dropdown::before,",
      ".nav-links > li > .sub-dropdown::after {",
      "  content: '';",
      "  position: absolute;",
      "  pointer-events: auto;",
      "}",
      ".nav-links > li > .dropdown::before {",
      "  left: 0;",
      "  right: 0;",
      "  top: -18px;",
      "  height: 18px;",
      "}",
      ".nav-links > li > .sub-dropdown::before {",
      "  top: -12px;",
      "  left: -12px;",
      "  width: 12px;",
      "  height: calc(100% + 24px);",
      "}",
      ".nav-links > li.is-open > .nav-item .nav-caret,",
      ".nav-links > li.shdr-open > .nav-item .nav-caret {",
      "  transform: rotate(180deg);",
      "}",
      ".nav-pill .dropdown,",
      ".nav-pill .sub-dropdown {",
      "  color: #111827 !important;",
      "}",
      ".nav-pill .dropdown a,",
      ".nav-pill .sub-dropdown a {",
      "  color: #111827 !important;",
      "}"
    ].join("\n");
    document.head.appendChild(style);
  }

  function escapeHtml(value) {
    return String(value || "")
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#39;");
  }

  function slugify(value) {
    return String(value || "")
      .toLowerCase()
      .replace(/[^a-z0-9]+/g, "-")
      .replace(/^-+|-+$/g, "");
  }

  function getConfig() {
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      if (!raw) return DEFAULT_CONFIG;
      const parsed = JSON.parse(raw);
      if (!parsed || !Array.isArray(parsed.menu)) return DEFAULT_CONFIG;
      return parsed;
    } catch (_) {
      return DEFAULT_CONFIG;
    }
  }

  function saveConfig(config) {
    if (!config || !Array.isArray(config.menu)) {
      throw new Error("Invalid header config");
    }
    localStorage.setItem(STORAGE_KEY, JSON.stringify(config));
  }

  function buildMenu(items, depth) {
    if (!Array.isArray(items) || !items.length) return "";
    const cls = depth === 0 ? "nav-links" : depth === 1 ? "dropdown" : "sub-dropdown";
    const html = items.map((item) => {
      const label = escapeHtml(item.label);
      const hasChildren = Array.isArray(item.children) && item.children.length > 0;
      if (depth === 0) {
        const itemClass = hasChildren ? "shdr-has-dropdown" : "";
        const navClasses = ["nav-item"];
        const menuId = "nav-menu-" + depth + "-" + slugify(item.label);
        if (label.toUpperCase().includes("PRODUCTS")) navClasses.push("nav-products");

        let control = "";
        if (hasChildren && item.href) {
          control = "<a class=\"" + navClasses.join(" ") + "\" href=\"" + escapeHtml(item.href) + "\" data-shdr-toggle aria-expanded=\"false\" aria-controls=\"" + menuId + "\">" + label + " <span class=\"shdr-caret\" aria-hidden=\"true\"></span></a>";
        } else if (hasChildren) {
          control = "<button class=\"" + navClasses.join(" ") + "\" type=\"button\" data-shdr-toggle aria-expanded=\"false\" aria-controls=\"" + menuId + "\">" + label + " <span class=\"shdr-caret\" aria-hidden=\"true\"></span></button>";
        } else if (item.href !== null && item.href !== undefined) {
          control = "<a class=\"" + navClasses.join(" ") + "\" href=\"" + escapeHtml(item.href) + "\">" + label + "</a>";
        } else {
          control = "<span class=\"nav-label-only\">" + label + "</span>";
        }

        const submenu = hasChildren
          ? buildMenu(item.children, depth + 1).replace("<ul class=\"dropdown\">", "<ul class=\"dropdown\" id=\"" + menuId + "\">")
          : "";

        return "<li class=\"" + itemClass + "\">" + control + submenu + "</li>";
      }

      const caret = hasChildren ? " <span>›</span>" : "";
      const anchor = (item.href === null || item.href === undefined)
        ? "<span class=\"nav-label-only\">" + label + "</span>"
        : "<a href=\"" + escapeHtml(item.href) + "\">" + label + caret + "</a>";
      return "<li>" + anchor + (hasChildren ? buildMenu(item.children, depth + 1) : "") + "</li>";
    }).join("");
    return "<ul class=\"" + cls + "\">" + html + "</ul>";
  }

  function applyHeaderConfig() {
    const config = getConfig();
    const logoWrap = document.querySelector(".header-logo");
    const logoImg = logoWrap ? logoWrap.querySelector("img") : null;
    const navPill = document.querySelector(".nav-pill");

    if (logoWrap && config.logoHref) logoWrap.setAttribute("href", config.logoHref);
    if (logoImg && config.logoUrl) logoImg.setAttribute("src", config.logoUrl);
    if (logoImg && config.logoAlt) logoImg.setAttribute("alt", config.logoAlt);

    if (!navPill || !Array.isArray(config.menu)) return;
    const existing = navPill.querySelector(".nav-links");
    const menuHtml = buildMenu(config.menu, 0);
    if (!menuHtml) return;

    if (existing) {
      existing.outerHTML = menuHtml;
    } else {
      navPill.insertAdjacentHTML("beforeend", menuHtml);
    }
  }

  function applyFooterConfig() {
    const config = getConfig();
    const footerCopy = document.querySelector(".footer-copy");
    const footerLinksWrap = document.querySelector(".footer-links");

    if (footerCopy && config.footerCopyHtml) {
      footerCopy.innerHTML = config.footerCopyHtml;
    }

    if (!footerLinksWrap || !Array.isArray(config.footerLinks)) {
      return;
    }

    const internalLinks = Array.from(footerLinksWrap.querySelectorAll("a:not([aria-label])"));
    config.footerLinks.forEach((linkConfig, index) => {
      const link = internalLinks[index];
      if (!link) return;
      link.textContent = linkConfig.label;
      link.setAttribute("href", linkConfig.href);
      link.removeAttribute("target");
      link.removeAttribute("rel");
    });
  }

  function normalizeLegacyLinks() {
    const rewrites = new Map([
      ["https://samrecover.com/contact-us/", "contact-us.php"],
      ["https://samrecover.com/contact-us", "contact-us.php"],
      ["https://samrecover.com/clinical-evidence/clinical-studies-abstracts/", "clinical-studies.php"],
      ["https://samrecover.com/clinical-evidence/clinical-studies-abstracts", "clinical-studies.php"]
    ]);

    document.querySelectorAll("a[href]").forEach((link) => {
      const href = link.getAttribute("href");
      if (!href || !rewrites.has(href)) {
        return;
      }

      link.setAttribute("href", rewrites.get(href));
      link.removeAttribute("target");
      link.removeAttribute("rel");
    });
  }

  function normalizeLeadForms() {
    const path = window.location.pathname || "";
    if (path.includes("/adminpanel-local/") || path.endsWith("/contact-us.php") || path.endsWith("/contact-us.php")) {
      return;
    }

    document.querySelectorAll("form[data-contact-redirect='true']").forEach((form) => {
      form.setAttribute("action", "contact-us.php");
      form.setAttribute("method", "GET");

      form.addEventListener("submit", function (event) {
        event.preventDefault();
        window.location.href = "contact-us.php";
      });
    });
  }

  function enableDelayedDropdowns() {
    const mobile = window.matchMedia('(max-width: 768px)');
    const items = Array.from(document.querySelectorAll('.nav-links > li.shdr-has-dropdown'));
    const timers = new Map();
    const openItem = (li) => {
      clearTimeout(timers.get(li));
      timers.delete(li);
      li.classList.add('shdr-open');
      const control = li.querySelector('[data-shdr-toggle]');
      if (control) control.setAttribute('aria-expanded', 'true');
    };
    const closeItem = (li) => {
      li.classList.remove('shdr-open');
      const control = li.querySelector('[data-shdr-toggle]');
      if (control) control.setAttribute('aria-expanded', 'false');
    };
    const scheduleClose = (li) => {
      if (mobile.matches) return;
      clearTimeout(timers.get(li));
      timers.set(li, window.setTimeout(() => closeItem(li), 700));
    };

    items.forEach((li) => {
      const control = li.querySelector('[data-shdr-toggle]');
      const dropdown = li.querySelector('.dropdown');

      li.addEventListener('mouseenter', () => {
        if (!mobile.matches) openItem(li);
      });
      li.addEventListener('mouseleave', () => scheduleClose(li));

      if (dropdown) {
        dropdown.addEventListener('mouseenter', () => {
          if (!mobile.matches) openItem(li);
        });
        dropdown.addEventListener('mouseleave', () => scheduleClose(li));
      }

      if (control) {
        control.addEventListener('click', (event) => {
          if (!mobile.matches) return;
          const isLink = control.tagName === 'A' && control.getAttribute('href');
          const alreadyOpen = li.classList.contains('shdr-open');
          if (!alreadyOpen) {
            event.preventDefault();
          } else if (!isLink) {
            event.preventDefault();
          }
          const open = alreadyOpen ? (isLink ? false : li.classList.toggle('shdr-open')) : li.classList.toggle('shdr-open');
          control.setAttribute('aria-expanded', String(open));
          items.filter((item) => item !== li).forEach(closeItem);
        });
      }
    });

    document.addEventListener('click', (event) => {
      if (!event.target.closest('.nav-pill')) {
        items.forEach(closeItem);
      }
    });
  }

  window.SamHeaderConfig = {
    storageKey: STORAGE_KEY,
    defaultConfig: DEFAULT_CONFIG,
    getConfig,
    saveConfig
  };

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () {
      injectGlobalStyles();
      if (!window.location.pathname.includes("/adminpanel-local/")) {
        normalizeLegacyLinks();
        applyHeaderConfig();
        applyFooterConfig();
        normalizeLeadForms();
        enableDelayedDropdowns();
      }
    });
  } else {
    injectGlobalStyles();
    if (!window.location.pathname.includes("/adminpanel-local/")) {
      normalizeLegacyLinks();
      applyHeaderConfig();
      applyFooterConfig();
      normalizeLeadForms();
      enableDelayedDropdowns();
    }
  }
})();
