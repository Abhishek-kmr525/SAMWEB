<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>sam&reg; Treatment | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
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
  body { font-family: 'Inter', sans-serif; background: var(--white); color: var(--black); overflow-x: hidden; }

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
  .btn-primary { background: var(--green); color: var(--white); padding: 14px 32px; border-radius: 8px; font-size: 15px; font-weight: 700; text-decoration: none; transition: all 0.2s; border: none; cursor: pointer; display: inline-block; }
  .btn-primary:hover { background: #15803d; box-shadow: 0 6px 20px rgba(22,163,74,0.3); transform: translateY(-1px); }
  .btn-outline { background: transparent; color: var(--black); border: 2px solid var(--gray-300); padding: 14px 32px; border-radius: 8px; font-size: 15px; font-weight: 900; text-decoration: none; transition: all 0.2s; display: inline-block; }
  .btn-outline:hover { border-color: var(--green); color: var(--green); }
  
  .section-tag { color: var(--green); font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 16px; display: inline-block; }
  .section-title { font-size: clamp(32px, 4vw, 48px); font-weight: 900; line-height: 1.1; letter-spacing: -0.03em; color: var(--black); margin-bottom: 24px; }

  /* HERO TREATMENT */
  .hero-treatment {
    padding: 160px 56px 100px; background: linear-gradient(180deg, var(--green-bg) 0%, var(--white) 100%);
    display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;
    max-width: 1280px; margin: 0 auto;
  }
  .hero-content { opacity: 0; transform: translateY(30px); }
  .hero-desc { font-size: 18px; color: var(--gray-700); line-height: 1.7; margin-bottom: 40px; font-weight: 400; }
  .hero-actions { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 32px; }
  
  .hero-media { position: relative; opacity: 0; transform: translateX(30px); height: 100%; }
  .hero-media-wrapper { 
    border-radius: 0 40px 40px 0; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1); 
    position: relative; z-index: 2; height: 100%; display: flex;
  }
  .hero-media-wrapper img { width: 100%; height: 100%; display: block; object-fit: cover; }


  /* MOLECULAR HEALING SECTION */
  .molecular-section { padding: 100px 56px; background: var(--gray-900); color: var(--white); }
  .molecular-inner { max-width: 1100px; margin: 0 auto; }
  .molecular-header { text-align: center; margin-bottom: 64px; max-width: 800px; margin-inline: auto; }
  .molecular-header .section-tag { color: var(--green); }
  .molecular-header .section-title { color: var(--white); }
  
  .cards-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px; }
  .m-card {
    background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);
    border-radius: 16px; padding: 40px 32px;
    transition: all 0.3s ease; opacity: 0; transform: translateY(30px);
  }
  .m-card:hover {
    background: rgba(255,255,255,0.1); border-color: var(--green);
    transform: translateY(-8px);
  }
  .m-card-icon {
    width: 52px;
    height: 52px;
    margin-bottom: 22px;
    color: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .m-card-icon svg {
    width: 100%;
    height: 100%;
    display: block;
    stroke: currentColor;
    fill: none;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
  }
  .m-card-title { font-size: 20px; font-weight: 800; margin-bottom: 16px; color: var(--white); line-height: 1.3; }
  .m-card-desc { font-size: 15px; color: #9ca3af; line-height: 1.6; margin-bottom: 20px; }
  .m-card-link { font-size: 13px; color: var(--green); font-weight: 700; text-decoration: none; text-transform: uppercase; letter-spacing: 0.05em; }
  .m-card-link:hover { text-decoration: underline; }

  /* SPLIT SECTIONS (sam 2.0 & Professional Therapy) */
  .split-section { padding: 120px 56px; background: var(--white); }
  .split-section.alt-bg { background: var(--gray-50); }
  .split-inner { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
  
  .split-content { opacity: 0; transform: translateY(30px); }
  .split-content p { font-size: 17px; color: var(--gray-700); line-height: 1.7; margin-bottom: 24px; }
  
  .split-media { position: relative; opacity: 0; transform: translateX(30px); }
  .split-media.reverse-anim { transform: translateX(-30px); }
  .split-media-wrap { 
    border-radius: 24px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.1);
    position: relative; z-index: 2;
  }
  .split-media-wrap img { width: 100%; height: auto; display: block; border-radius: 24px; }
  .split-media-pattern {
    position: absolute; bottom: -20px; left: -20px; width: 60%; height: 60%;
    background-image: radial-gradient(var(--gray-300) 2px, transparent 2px);
    background-size: 20px 20px; z-index: 1; border-radius: 20px;
  }
  
  .usa-badge-container { display: flex; gap: 20px; align-items: center; margin-top: 40px; padding-top: 32px; border-top: 1px solid var(--gray-300); }
  .usa-badge-container img { height: 60px; object-fit: contain; }

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
    .hero-treatment { grid-template-columns: 1fr; padding: 120px 24px 60px; gap: 40px; }
    .split-inner { grid-template-columns: 1fr; gap: 40px; }
    .split-inner.reverse { display: flex; flex-direction: column-reverse; }
    .cards-grid { grid-template-columns: 1fr; }
    .molecular-section, .split-section { padding: 80px 24px; }
    .cta-section { padding: 80px 24px; }
    footer { flex-direction: column; padding: 32px 24px; }
  }
</style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
  <?php include __DIR__ . '/includes/google-tag.php'; ?>
</head>
<body>

<!-- HEADER -->
<?php include __DIR__ . '/includes/header.php'; ?>


<!-- HERO TREATMENT -->
<section class="hero-treatment">
  <div class="hero-content" id="heroContent">
    <div class="section-tag">sam&reg; Treatment</div>
    <h1 class="section-title">
      Wearable long duration ultrasound for active recovery.
    </h1>
    <p class="hero-desc">
      sam&reg; 2.0 is the only FDA-cleared long duration ultrasound device for prescription home-use. Used by elite athletes, soldiers and veterans, and chronic pain sufferers for clinically proven treatment of chronic arthritis pain and accelerated natural healing.
    </p>
    <div class="hero-actions">
      <a href="https://samsport.com/" class="btn-primary" target="_blank" rel="noopener">Order sam&reg; Today</a>
      <a href="clinical-studies.php" class="btn-outline">View Clinical Evidence</a>
    </div>
  </div>
  <div class="hero-media" id="heroMedia">
    <div class="hero-pattern"></div>
    <div class="hero-media-wrapper">
      <img src="https://pub-ce72dd6475514908a6d97cfa33c7af95.r2.dev/sam%20treatement.png" alt="Woman wearing electronic device on arm and shoulder" />
    </div>
  </div>
</section>

<!-- MOLECULAR HEALING -->
<section class="molecular-section">
  <div class="molecular-inner">
    <div class="molecular-header">
      <div class="section-tag">Cellular Level Healing</div>
      <h2 class="section-title">sam&reg; delivers continuous ultrasound that accelerates your natural healing at the molecular level.</h2>
    </div>
    <div class="cards-grid">
      <div class="m-card">
        <div class="m-card-icon" aria-hidden="true">
          <svg viewBox="0 0 48 48" role="img" aria-label="Arrow icon">
            <path d="M24 10v21"></path>
            <path d="M15 24l9 9 9-9"></path>
          </svg>
        </div>
        <h3 class="m-card-title">Reduced Arthritis Pain</h3>
        <p class="m-card-desc">Daily sam&reg; treatment reduced arthritis pain by 40%-70% in patients with moderate to severe knee osteoarthritis.</p>
        <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7784557/" target="_blank" class="m-card-link">Read Study &rarr;</a>
      </div>
      <div class="m-card">
        <div class="m-card-icon" aria-hidden="true">
          <svg viewBox="0 0 48 48" role="img" aria-label="Pill icon">
            <path d="M19 14a10 10 0 0 1 14 14L28 33a10 10 0 0 1-14-14l5-5z"></path>
            <path d="M18 20l10 10"></path>
          </svg>
        </div>
        <h3 class="m-card-title">Reduced Opioid Use</h3>
        <p class="m-card-desc">sam&reg; significantly reduced opioid pain medication use in the treatment of back pain and improved patients' quality of life.</p>
        <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7287226/" target="_blank" class="m-card-link">Read Study &rarr;</a>
      </div>
      <div class="m-card">
        <div class="m-card-icon" aria-hidden="true">
          <svg viewBox="0 0 48 48" role="img" aria-label="Briefcase icon">
            <rect x="10" y="16" width="28" height="20" rx="3"></rect>
            <path d="M18 16v-3a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v3"></path>
            <path d="M10 23h28"></path>
            <path d="M20 23v3h8v-3"></path>
          </svg>
        </div>
        <h3 class="m-card-title">Return to Work</h3>
        <p class="m-card-desc">sam&reg; successfully returned patients back to work and normal activity after conservative interventions had failed.</p>
        <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7544191/" target="_blank" class="m-card-link">Read Study &rarr;</a>
      </div>
    </div>
  </div>
</section>

<!-- SPLIT 1: SAM 2.0 -->
<section class="split-section">
  <div class="split-inner">
    <div class="split-media reverse-anim split-media-1">
      <div class="split-media-pattern"></div>
      <div class="split-media-wrap">
        <img src="uploads/2021/01/Sam_Sport_26_600.jpg" alt="Athlete using sam device" />
      </div>
    </div>
    <div class="split-content split-content-1">
      <div class="section-tag">sam&reg; 2.0</div>
      <h2 class="section-title">Engineered for performance and durability.</h2>
      <p>Our products are developed and clinically PROVEN with research studies funded by the National Institutes of Health and United States Army. sam&reg; 2.0 is the first available sustained acoustic medicine product to offer single touch control, rapid charge, enhanced coupling patches and rugged housing.</p>
      <p>sam&reg; is ready to provide hardworking Americans like you with the soft tissue healing therapy you deserve so you can, ideally, avoid invasive therapy or opioid painkillers. All you need is a prescription from your doctor to start the treatment that top college and professional athletes use to heal.</p>
      
      <div class="usa-badge-container">
        <img src="uploads/2021/01/USA_.png" alt="Manufactured in USA" />
        <img src="uploads/2021/01/FDA_.png" alt="FDA Cleared" />
        <div style="font-size: 13px; color: var(--gray-500); max-width: 200px; line-height: 1.5;">
          Patented medical technology proudly developed and manufactured in the USA.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SPLIT 2: Professional Therapy in Your Home -->
<section class="split-section alt-bg">
  <div class="split-inner reverse">
    <div class="split-content split-content-2">
      <div class="section-tag">Convenience</div>
      <h2 class="section-title">Professional Therapy in Your Home.</h2>
      <p>The sam&reg; device is an ultrasound device that you apply to the area of your affected muscles and soft tissue. For four hours every day, the sam&reg; device sends ultrasonic pulses deep into your muscles in order to gently accelerate your healing process without invasive surgery.</p>
      <p>Since we were cleared by the FDA in 2013, we-ve helped thousands with their soft tissue injuries and pain - and we-re ready to help you find relief. Join the countless patients who have taken their recovery into their own hands with sustained acoustic medicine.</p>
      <a href="tel:+18882029831" class="btn-primary" style="margin-top: 16px;">Call (888) 202-9831</a>
    </div>
    <div class="split-media split-media-2">
      <div class="split-media-pattern" style="right: -20px; left: auto; top: -20px; bottom: auto;"></div>
      <div class="split-media-wrap">
        <img src="uploads/2021/01/Sam_Sport_9_600.jpg" alt="Patient applying sam device" />
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="cta-inner">
    <h2>Get Your Life Back.</h2>
    <p>Learn if sam&reg; treatment of arthritis, chronic pain and sports-related injuries is right for you. Find relief today without surgery or opioids.</p>
    <div class="cta-btns">
      <a href="https://samsport.com/" class="btn-white" target="_blank" rel="noopener">Order sam&reg; Now</a>
      <a href="contact-us.php" class="btn-bordered" style="background: transparent; color: var(--white); border: 2px solid rgba(255,255,255,0.25); padding: 16px 36px; border-radius: 8px; font-size: 16px; font-weight: 900; text-decoration: none; transition: all 0.2s;">Contact Us</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>


<script>
gsap.registerPlugin(ScrollTrigger);

gsap.timeline({ delay: 0.2 })
  .to('#heroContent', { opacity:1, y:0, duration:0.8, ease:'power3.out' })
  .to('#heroMedia', { opacity:1, x:0, duration:0.8, ease:'power3.out' }, '-=0.5');

document.querySelectorAll('.m-card').forEach((el, i) => {
  gsap.to(el, { opacity:1, y:0, duration:0.6, delay: i*0.15,
    scrollTrigger: { trigger: '.molecular-section', start: 'top 75%' }
  });
});

gsap.to('.split-media-1', { opacity:1, x:0, duration:0.8,
  scrollTrigger: { trigger: '.split-media-1', start: 'top 75%' }
});
gsap.to('.split-content-1', { opacity:1, y:0, duration:0.8, delay: 0.2,
  scrollTrigger: { trigger: '.split-media-1', start: 'top 75%' }
});

gsap.to('.split-media-2', { opacity:1, x:0, duration:0.8,
  scrollTrigger: { trigger: '.split-media-2', start: 'top 75%' }
});
gsap.to('.split-content-2', { opacity:1, y:0, duration:0.8, delay: 0.2,
  scrollTrigger: { trigger: '.split-media-2', start: 'top 75%' }
});
</script>
<script src="assets/header-config.js?v=20260911-1"></script>
</body>
</html>









