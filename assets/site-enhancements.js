(function () {
  function ensureFavicon() {
    var head = document.head;
    if (!head) return;
    var href = "favicon-sam.png";
    var icons = [
      { rel: "icon", type: "image/png", href: href },
      { rel: "shortcut icon", type: "image/png", href: href },
      { rel: "apple-touch-icon", href: href }
    ];

    icons.forEach(function (icon) {
      var selector = 'link[rel="' + icon.rel + '"]';
      var node = document.querySelector(selector);
      if (!node) {
        node = document.createElement("link");
        node.setAttribute("rel", icon.rel);
        head.appendChild(node);
      }
      if (icon.type) node.setAttribute("type", icon.type);
      node.setAttribute("href", icon.href);
    });
  }

  function normalizeYoutubeUrl(url) {
    try {
      var parsed = new URL(url, window.location.origin);
      parsed.searchParams.set("autoplay", "1");
      parsed.searchParams.set("rel", "0");
      return parsed.toString();
    } catch (_) {
      return url;
    }
  }

  function extractVideoSource(node) {
    if (!node) return null;

    if (node.tagName === "VIDEO") {
      var source = node.currentSrc || node.getAttribute("src");
      if (!source) {
        var childSource = node.querySelector("source");
        source = childSource ? childSource.getAttribute("src") : "";
      }
      if (!source) return null;
      return {
        type: "video",
        src: source,
        title: node.getAttribute("aria-label") || node.getAttribute("title") || "sam video"
      };
    }

    if (node.tagName === "IFRAME") {
      var iframeSrc = node.getAttribute("src");
      if (!iframeSrc) return null;
      return {
        type: "iframe",
        src: normalizeYoutubeUrl(iframeSrc),
        title: node.getAttribute("title") || "sam video"
      };
    }

    return null;
  }

  function createModalController() {
    var modal = document.getElementById("siteVideoModal");
    var content = document.getElementById("siteVideoContent");
    var closeBtn = document.querySelector("[data-site-video-close]");
    if (!modal || !content) return null;

    function clearModal() {
      content.innerHTML = "";
    }

    function closeModal() {
      modal.classList.remove("is-open");
      modal.setAttribute("aria-hidden", "true");
      document.body.style.overflow = "";
      clearModal();
    }

    function openModal(payload) {
      if (!payload || !payload.src) return;
      clearModal();

      if (payload.type === "iframe") {
        var iframe = document.createElement("iframe");
        iframe.src = payload.src;
        iframe.title = payload.title || "sam video";
        iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share";
        iframe.allowFullscreen = true;
        content.appendChild(iframe);
      } else {
        var video = document.createElement("video");
        video.controls = true;
        video.autoplay = true;
        video.playsInline = true;
        var source = document.createElement("source");
        source.src = payload.src;
        source.type = "video/mp4";
        video.appendChild(source);
        content.appendChild(video);
      }

      modal.classList.add("is-open");
      modal.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden";
    }

    closeBtn && closeBtn.addEventListener("click", closeModal);
    modal.addEventListener("click", function (event) {
      if (event.target === modal) closeModal();
    });
    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && modal.classList.contains("is-open")) {
        closeModal();
      }
    });

    return {
      open: openModal,
      close: closeModal
    };
  }

  function attachTrigger(container, payload, modal) {
    if (!container || !payload || !modal) return;
    if (container.dataset.videoModalReady === "true") return;

    container.dataset.videoModalReady = "true";
    container.classList.add("site-video-trigger");

    var button = document.createElement("button");
    button.type = "button";
    button.className = "site-video-play";
    button.setAttribute("aria-label", "Play video");
    container.appendChild(button);

    function openHandler(event) {
      event.preventDefault();
      modal.open(payload);
    }

    button.addEventListener("click", openHandler);
    container.addEventListener("click", function (event) {
      if (event.target.closest(".site-video-play")) return;
      openHandler(event);
    });
  }

  function enhanceInlineVideos(modal) {
    var nodes = document.querySelectorAll("iframe[src*='youtube.com/embed'], iframe[src*='youtube-nocookie.com/embed'], video");
    nodes.forEach(function (node) {
      if (node.closest("#siteVideoModal")) return;
      if (node.classList.contains("contact-hero-video")) return;

      var payload = extractVideoSource(node);
      if (!payload) return;

      var parent = node.parentElement;
      if (!parent) return;
      attachTrigger(parent, payload, modal);
    });
  }

  function enhanceWatchLinks(modal) {
    var links = document.querySelectorAll("a[href='#video'], a[href='#videos'], a.btn-outline, a.btn-primary");
    links.forEach(function (link) {
      var text = (link.textContent || "").trim().toLowerCase();
      if (text !== "watch video" && text !== "play video") return;
      if (link.dataset.videoModalReady === "true") return;

      var scope = link.closest("section, main, .inner, .hero-shell") || document;
      var target = scope.querySelector("video, iframe[src*='youtube.com/embed'], iframe[src*='youtube-nocookie.com/embed']");
      var payload = extractVideoSource(target);
      if (!payload) return;

      link.dataset.videoModalReady = "true";
      link.addEventListener("click", function (event) {
        event.preventDefault();
        modal.open(payload);
      });
    });
  }

  function buildFeedbackBanner(form, type, message) {
    if (!form) return;
    var banner = form.previousElementSibling;
    if (!banner || !banner.classList.contains("form-feedback-banner")) {
      banner = document.createElement("div");
      banner.className = "form-feedback-banner";
      form.parentNode.insertBefore(banner, form);
    }
    banner.textContent = message;
    banner.classList.add("is-visible");
    banner.classList.remove("is-success", "is-error");
    banner.classList.add(type === "success" ? "is-success" : "is-error");
  }

  function initFormFeedback() {
    var params = new URLSearchParams(window.location.search);
    var status = params.get("form_status");
    var message = params.get("form_message");
    if (!status) return;

    var form = document.querySelector("[data-enquiry-form]");
    var thankyouOverlay = document.getElementById("thankyouOverlay");

    if (status === "success") {
      if (form && thankyouOverlay) {
        form.style.display = "none";
        thankyouOverlay.classList.add("visible");
        thankyouOverlay.scrollIntoView({ behavior: "smooth", block: "nearest" });
      } else if (form) {
        buildFeedbackBanner(form, "success", "Thank you. Your details were saved successfully and our team will reach out soon.");
        form.reset();
        form.scrollIntoView({ behavior: "smooth", block: "start" });
      }
      if (window.history && window.history.replaceState) {
        window.history.replaceState({}, document.title, window.location.pathname + window.location.hash);
      }
      return;
    }

    if (form) {
      buildFeedbackBanner(form, "error", message || "We could not submit your enquiry. Please review the form and try again.");
      form.scrollIntoView({ behavior: "smooth", block: "start" });
    }
    if (window.history && window.history.replaceState) {
      window.history.replaceState({}, document.title, window.location.pathname + window.location.hash);
    }
  }

  function init() {
    ensureFavicon();
    var modal = createModalController();
    if (modal) {
      enhanceInlineVideos(modal);
      enhanceWatchLinks(modal);
    }
    initFormFeedback();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
