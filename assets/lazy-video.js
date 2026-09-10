document.querySelectorAll('video.lazy-video').forEach((video) => {
  const loadVideo = () => {
    video.querySelectorAll('source[data-src]').forEach((source) => {
      source.src = source.dataset.src;
      source.removeAttribute('data-src');
    });
    video.load();
    video.play().catch(() => {});
  };

  if (!('IntersectionObserver' in window)) {
    loadVideo();
    return;
  }

  const observer = new IntersectionObserver((entries) => {
    if (!entries.some((entry) => entry.isIntersecting)) return;
    observer.disconnect();
    loadVideo();
  }, { rootMargin: '300px 0px' });

  observer.observe(video);
});
