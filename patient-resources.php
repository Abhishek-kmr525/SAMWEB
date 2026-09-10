<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Patient Resources | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<style>
  *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
  :root {
    --green: #c2d500;
    --green-light: #c2d500;
    --green-bg: #f0fdf4;
    --green-pale: #dcfce7;
    --black: #000000;
    --gray-900: #111827;
    --gray-700: #374151;
    --gray-500: #939598;
    --gray-300: #d1d5db;
    --gray-100: #f3f4f6;
    --gray-50: #f9fafb;
    --white: #ffffff;
  }
  html { scroll-behavior: smooth; }
  body { font-family: 'Inter', sans-serif; background: var(--gray-50); color: var(--black); overflow-x: hidden; }
  a { text-decoration: none; color: inherit; }

  /* HEADER & SUPERMENU */
  header {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: grid; grid-template-columns: 1fr auto 1fr; align-items: center;
    padding: 24px 56px; pointer-events: none;
  }
  .header-logo { pointer-events: auto; justify-self: start; }
  .header-logo img { height: 48px; }

  /* FLOATING PILL */
  .nav-pill {
    pointer-events: auto; justify-self: center;
    background: rgba(255,255,255,0.9); backdrop-filter: blur(20px);
    border: 1px solid var(--gray-300);
    border-radius: 100px; padding: 0 16px;
    display: flex; align-items: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  }
  .nav-links { display: flex; list-style: none; margin: 0; padding: 0; }
  .nav-links > li { position: relative; }
  .nav-links > li > a {
    color: var(--gray-700); text-decoration: none; font-size: 13px; font-weight: 900;
    padding: 16px 20px; display: block; letter-spacing: 0.05em; text-transform: uppercase;
    transition: color 0.2s;
  }
  .nav-links > li > a:hover { color: var(--green); }
  
  /* DROPDOWNS */
  .dropdown {
    position: absolute; top: 100%; left: 50%; transform: translateX(-50%) translateY(10px);
    background: rgba(255,255,255,0.95); backdrop-filter: blur(24px);
    border: 1px solid var(--gray-300); border-radius: 16px;
    padding: 12px 0; min-width: 220px;
    opacity: 0; visibility: hidden; transition: all 0.2s ease;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  .nav-links > li:hover > .dropdown { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0); }
  .dropdown li { position: relative; display: block; }
  .dropdown a {
    color: var(--gray-700); text-decoration: none; font-size: 14px; font-weight: 500;
    padding: 10px 24px; display: flex; align-items: center; justify-content: space-between;
    transition: all 0.2s;
  }
  .dropdown a:hover { color: var(--green); background: var(--gray-50); }
  
  .dropdown .sub-dropdown {
    position: absolute; top: -12px; left: 100%; transform: translateX(10px);
    background: rgba(255,255,255,0.95); backdrop-filter: blur(24px);
    border: 1px solid var(--gray-300); border-radius: 16px;
    padding: 12px 0; min-width: 200px;
    opacity: 0; visibility: hidden; transition: all 0.2s ease;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  .dropdown li:hover > .sub-dropdown { opacity: 1; visibility: visible; transform: translateX(4px); }

  /* BUTTONS */
  .btn-primary { background: var(--green); color: var(--black); padding: 14px 32px; border-radius: 8px; font-size: 15px; font-weight: 700; text-decoration: none; transition: all 0.2s; border: none; cursor: pointer; display: inline-block; }
  .btn-primary:hover { background: #b0c200; box-shadow: 0 6px 20px rgba(194,213,0,0.3); transform: translateY(-1px); }

  .section-tag { color: var(--green); font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 16px; display: inline-block; }
  .section-title { font-size: clamp(32px, 4vw, 56px); font-weight: 900; line-height: 1.1; letter-spacing: -0.03em; color: var(--black); margin-bottom: 24px; }

  /* HERO PATIENT */
  .hero-patient {
    padding: 220px 56px 120px; background: var(--gray-900);
    position: relative; overflow: hidden; color: var(--white); text-align: center;
  }
  .hero-bg {
    position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.3; z-index: 0;
  }
  .hero-patient-inner { position: relative; z-index: 1; max-width: 800px; margin: 0 auto; opacity: 0; transform: translateY(30px); }
  .hero-patient .section-title { color: var(--white); margin-bottom: 24px; }
  .hero-patient p { font-size: 20px; color: var(--gray-300); line-height: 1.6; }

  /* RESOURCES GRID SECTION */
  .resources-section { padding: 100px 56px; max-width: 1280px; margin: 0 auto; }
  .resources-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; }
  .r-card {
    background: var(--white); border: 1px solid var(--gray-300); border-radius: 24px; overflow: hidden;
    transition: all 0.3s ease; opacity: 0; transform: translateY(30px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.05); display: flex; flex-direction: column;
  }
  .r-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); border-color: var(--green); }
  .r-card-img-wrap { width: 100%; height: auto; overflow: hidden; background: var(--gray-50); }
  .r-card-img { width: 100%; height: auto; display: block; object-fit: contain; transition: transform 0.5s ease; }
  .r-card:hover .r-card-img { transform: scale(1.03); }
  .r-card-body { padding: 40px 32px; flex: 1; display: flex; flex-direction: column; }
  .r-card-title { font-size: 24px; font-weight: 800; color: var(--black); margin-bottom: 16px; line-height: 1.2; letter-spacing: -0.02em; }
  .r-card-desc { font-size: 16px; color: var(--gray-700); line-height: 1.6; margin-bottom: 32px; flex: 1; }
  .r-card-link { font-size: 14px; color: var(--green); font-weight: 800; text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; margin-top: auto; display: inline-flex; align-items: center; gap: 8px; }
  .r-card-link:hover { text-decoration: underline; }

  /* CTA SECTION */
  .cta-section { background: var(--black); padding: 120px 56px; text-align: center; }
  .cta-inner { max-width: 700px; margin: 0 auto; }
  .cta-section h2 { font-size: clamp(32px, 4vw, 56px); font-weight: 900; color: var(--white); letter-spacing: -0.03em; margin-bottom: 20px; }
  .cta-section p { font-size: 18px; color: #94a3b8; line-height: 1.6; margin-bottom: 44px; }
  .cta-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; }
  .btn-white { background: var(--green); color: var(--black); padding: 16px 36px; border-radius: 8px; font-size: 16px; font-weight: 700; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 12px rgba(194,213,0,0.15); }
  .btn-white:hover { background: #b0c200; box-shadow: 0 8px 24px rgba(194,213,0,0.3); transform: translateY(-1px); }

  footer {
    background: var(--gray-900); padding: 40px 56px;
    display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;
    border-top: 1px solid rgba(255,255,255,0.08);
  }
  .footer-logo img { height: 30px; opacity: 0.6; }
  .footer-copy { color: #6b7280; font-size: 13px; }
  .footer-links a { color: #6b7280; text-decoration: none; font-size: 13px; margin-left: 24px; transition: color 0.2s; }
  .footer-links a:hover { color: var(--white); }

  @media (max-width: 900px) {
    nav { padding: 0 24px; }
    .nav-links { display: none; }
    .hero-patient { padding: 160px 24px 80px; }
    .resources-grid { grid-template-columns: 1fr; }
    .resources-section { padding: 60px 24px; }
    .cta-section { padding: 80px 24px; }
    footer { flex-direction: column; padding: 32px 24px; text-align: center; }
    .footer-links a { margin: 0 12px; }
  }
</style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
</head>
<body>

<!-- HEADER -->
<?php include __DIR__ . '/includes/header.php'; ?>


<!-- HERO PATIENT RESOURCES -->
<section class="hero-patient">
  <img src="uploads/2021/01/Sam_header_1350x300_Black-4.jpg" alt="Patient Resources Background" class="hero-bg" />
  <div class="hero-patient-inner" id="heroInner">
    <div class="section-tag">Patient Resources</div>
    <h1 class="section-title">Get Your Life Back!</h1>
    <p>Learn if sam&reg; treatment of arthritis, chronic pain and sports-related injuries is right for you.</p>
  </div>
</section>

<!-- RESOURCES CARDS -->
<section class="resources-section">
  <div class="resources-grid">
    
    <!-- Card 1 -->
    <a href="injury-type.php" class="r-card">
      <div class="r-card-img-wrap">
        <img src="uploads/2021/01/Sam_Patient_Resources_Injury_types.jpg" alt="Injury Types" class="r-card-img"/>
      </div>
      <div class="r-card-body">
        <h3 class="r-card-title">Injury Type</h3>
        <p class="r-card-desc">sam&reg; has you covered for common injuries. If you are suffering from a soft-tissue injury, military related injury or chronic joint pain, the non-invasive sam&reg; treatment could help you get back on the road to recovery.</p>
        <span class="r-card-link">Learn More <span>&rarr;</span></span>
      </div>
    </a>

    <!-- Card 2 -->
    <a href="instructional-videos.php" class="r-card">
      <div class="r-card-img-wrap">
        <img src="uploads/2021/01/Sam_Patient_Resources_Instructional.jpg" alt="Instructional Videos" class="r-card-img"/>
      </div>
      <div class="r-card-body">
        <h3 class="r-card-title">Learn How to Apply sam&reg;</h3>
        <p class="r-card-desc">Let's get started! Here is everything you need to know to get started on your recovery. Learn about placement application and receive clinical training from Dr. Kevin Wilk.</p>
        <span class="r-card-link">Learn More <span>&rarr;</span></span>
      </div>
    </a>

    <!-- Card 3 -->
    <a href="testimonials.php" class="r-card">
      <div class="r-card-img-wrap">
        <img src="uploads/2021/01/Sam_Patient_Resources_Testimonials.jpg" alt="Testimonials" class="r-card-img"/>
      </div>
      <div class="r-card-body">
        <h3 class="r-card-title">Hear First Hand</h3>
        <p class="r-card-desc">Treatment with sam&reg; has helped many individuals get their life back. Hear the countless stories of recovery and the difference sam&reg; made.</p>
        <span class="r-card-link">Learn More <span>&rarr;</span></span>
      </div>
    </a>

  </div>
</section>

<!-- CONTACT CTA -->
<section class="cta-section">
  <div class="cta-inner">
    <h2>Contact Us Today!</h2>
    <p>Call us at <strong>(888) 202-9831</strong> or fill out the contact form and someone from our team will connect with you to discuss your path to recovery.</p>
    <div class="cta-btns">
      <a href="contact-us.php" class="btn-white" target="_blank">Fill Out Contact Form</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>


<script>
gsap.registerPlugin(ScrollTrigger);

gsap.to('#heroInner', { opacity: 1, y: 0, duration: 1, ease: 'power3.out', delay: 0.2 });

document.querySelectorAll('.r-card').forEach((el, i) => {
  gsap.to(el, { opacity: 1, y: 0, duration: 0.8, delay: i * 0.15,
    scrollTrigger: { trigger: '.resources-section', start: 'top 80%' }
  });
});
</script>
<script src="assets/header-config.js?v=20260911-1"></script>
</body>
</html>













