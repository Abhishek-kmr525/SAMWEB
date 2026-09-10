<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Products | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
<meta name="description" content="Compare sam 2.0 and sam X1 sustained acoustic medicine products and choose the right wearable ultrasound therapy system."/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
<style>
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
  :root {
    --green: #c2d500;
    --green-deep: #a7b900;
    --green-soft: #f6f9df;
    --green-pale: #e7ef9d;
    --black: #000000;
    --ink: #0c1118;
    --gray-900: #111827;
    --gray-700: #374151;
    --gray-500: #939598;
    --gray-300: #d1d5db;
    --gray-200: #e5e7eb;
    --gray-100: #f3f4f6;
    --gray-50: #f9fafb;
    --white: #ffffff;
  }
  html { scroll-behavior: smooth; }
  body {
    font-family: "Inter", sans-serif;
    color: var(--black);
    background: var(--white);
    overflow-x: hidden;
    line-height: 1.5;
  }
  a { color: inherit; }

  header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    padding: 24px 56px;
    pointer-events: none;
  }
  .header-logo { pointer-events: auto; justify-self: start; }
  .header-logo img { height: 48px; display: block; }
  .nav-pill {
    pointer-events: auto;
    justify-self: center;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(20px);
    border: 1px solid var(--gray-300);
    border-radius: 100px;
    padding: 0 16px;
    display: flex;
    align-items: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }
  .nav-links { display: flex; list-style: none; }
  .nav-links > li { position: relative; }
  .nav-links > li > a {
    color: var(--gray-700);
    text-decoration: none;
    font-size: 13px;
    font-weight: 800;
    padding: 16px 18px;
    display: block;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    white-space: nowrap;
    transition: color 0.2s;
  }
  .nav-links > li > a:hover,
  .nav-links > li > a.active { color: var(--green-deep); }
  .dropdown {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%) translateY(10px);
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(24px);
    border: 1px solid var(--gray-300);
    border-radius: 16px;
    padding: 12px 0;
    min-width: 220px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  }
  .nav-links > li:hover > .dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
  }
  .dropdown li { list-style: none; }
  .dropdown a {
    color: var(--gray-700);
    text-decoration: none;
    font-size: 14px;
    font-weight: 650;
    padding: 10px 24px;
    display: block;
    transition: all 0.2s;
  }
  .dropdown a:hover,
  .dropdown a.active { color: var(--green-deep); background: var(--gray-50); }

  .products-hero {
    min-height: 100vh;
    padding: 132px 56px 96px;
    background:
      linear-gradient(90deg, rgba(12, 17, 24, 0.96), rgba(12, 17, 24, 0.84)),
      url("https://samrecover.com/wp-content/uploads/2021/01/Sam_Headers_Products_3-1.jpg") center / cover;
    color: var(--white);
    display: grid;
    align-items: end;
    position: relative;
    overflow: hidden;
  }
  .products-hero::after {
    content: none;
  }
  .hero-inner {
    width: min(1180px, 100%);
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }
  .eyebrow {
    display: inline-flex;
    align-items: center;
    color: var(--green);
    border: 1px solid rgba(194, 213, 0, 0.45);
    border-radius: 100px;
    padding: 7px 15px;
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 0.11em;
    text-transform: uppercase;
    margin-bottom: 28px;
  }
  .hero-title {
    max-width: 900px;
    font-size: clamp(50px, 7vw, 104px);
    font-weight: 900;
    line-height: 0.95;
    letter-spacing: -0.045em;
    margin-bottom: 28px;
  }
  .hero-title span { color: var(--green); }
  .hero-copy {
    max-width: 680px;
    color: rgba(255, 255, 255, 0.72);
    font-size: 19px;
    line-height: 1.7;
  }

  .section { padding: 100px 56px; }
  .section.alt { background: var(--gray-50); }
  .section.dark { background: var(--ink); color: var(--white); }
  .inner { max-width: 1180px; margin: 0 auto; }
  .section-header {
    max-width: 760px;
    margin-bottom: 56px;
  }
  .section-header.center {
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }
  .section-tag {
    color: var(--green-deep);
    font-size: 13px;
    font-weight: 900;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin-bottom: 12px;
  }
  .dark .section-tag { color: var(--green); }
  .section-title {
    font-size: clamp(31px, 4vw, 54px);
    line-height: 1.05;
    font-weight: 900;
    letter-spacing: -0.035em;
  }
  .section-desc {
    color: var(--gray-500);
    font-size: 17px;
    line-height: 1.7;
    margin-top: 18px;
  }

  .product-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 26px;
  }
  .product-card {
    position: relative;
    min-height: 680px;
    border-radius: 26px;
    overflow: hidden;
    background: var(--white);
    border: 1px solid var(--gray-100);
    box-shadow: 0 24px 70px rgba(0, 0, 0, 0.1);
    display: grid;
    grid-template-rows: 340px 1fr;
  }
  .product-media {
    background: var(--ink);
    overflow: hidden;
    position: relative;
  }
  .product-media img,
  .product-media video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.45s;
  }
  .product-card:hover .product-media img,
  .product-card:hover .product-media video { transform: scale(1.04); }
  .product-badge {
    position: absolute;
    left: 22px;
    top: 22px;
    z-index: 2;
    background: var(--green);
    color: var(--black);
    border-radius: 100px;
    padding: 8px 14px;
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 0.08em;
    text-transform: uppercase;
  }
  .product-body {
    padding: 34px;
    display: flex;
    flex-direction: column;
  }
  .product-kicker {
    color: var(--green-deep);
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin-bottom: 14px;
  }
  .product-card h2 {
    font-size: clamp(34px, 4vw, 52px);
    line-height: 0.98;
    font-weight: 900;
    letter-spacing: -0.04em;
    margin-bottom: 18px;
  }
  .product-card p {
    color: var(--gray-500);
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 26px;
  }
  .feature-list {
    display: grid;
    gap: 12px;
    list-style: none;
    margin-bottom: 30px;
  }
  .feature-list li {
    display: grid;
    grid-template-columns: 26px 1fr;
    gap: 10px;
    color: var(--gray-700);
    font-size: 14px;
    font-weight: 700;
    line-height: 1.45;
  }
  .feature-list li::before {
    content: "";
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--green);
    box-shadow: inset 0 0 0 7px rgba(255, 255, 255, 0.55);
  }
  .product-actions {
    margin-top: auto;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
  }
  .btn-primary,
  .btn-outline,
  .btn-dark,
  .btn-bordered {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 48px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 850;
    transition: all 0.2s;
  }
  .btn-primary {
    background: var(--green);
    color: var(--black);
    padding: 14px 30px;
    box-shadow: 0 8px 28px rgba(194, 213, 0, 0.25);
  }
  .btn-primary:hover { background: var(--green-deep); transform: translateY(-1px); }
  .btn-dark {
    background: var(--ink);
    color: var(--white);
    padding: 14px 30px;
  }
  .btn-dark:hover { transform: translateY(-1px); }
  .btn-outline {
    color: var(--ink);
    border: 2px solid var(--gray-200);
    padding: 12px 28px;
  }
  .btn-outline:hover { border-color: var(--ink); background: var(--gray-50); }
  .btn-bordered {
    border: 2px solid rgba(255, 255, 255, 0.25);
    color: var(--white);
    padding: 12px 28px;
  }
  .btn-bordered:hover { border-color: var(--green); color: var(--green); }

  .compare-board {
    background: var(--white);
    border: 1px solid var(--gray-100);
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 18px 54px rgba(0, 0, 0, 0.07);
  }
  .compare-row {
    display: grid;
    grid-template-columns: 0.72fr 1fr 1fr 1fr;
    border-bottom: 1px solid var(--gray-100);
  }
  .compare-row:last-child { border-bottom: 0; }
  .compare-cell {
    padding: 22px 24px;
    border-right: 1px solid var(--gray-100);
    color: var(--gray-700);
    font-size: 14px;
    line-height: 1.55;
  }
  .compare-cell:last-child { border-right: 0; }
  .compare-head .compare-cell {
    background: var(--ink);
    color: var(--white);
    font-weight: 900;
    font-size: 16px;
  }
  .compare-label {
    color: var(--black);
    font-weight: 900;
  }
  .compare-head .compare-label { color: var(--green); }

  .decision-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }
  .decision-card {
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 18px;
    padding: 28px;
  }
  .decision-card b {
    display: block;
    color: var(--green);
    font-size: 38px;
    line-height: 1;
    margin-bottom: 18px;
  }
  .decision-card h3 { font-size: 19px; font-weight: 900; margin-bottom: 10px; }
  .decision-card p { color: rgba(255, 255, 255, 0.68); font-size: 14px; line-height: 1.65; }

  .cta-section {
    background: var(--green);
    padding: 92px 56px;
    text-align: center;
  }
  .cta-inner { max-width: 780px; margin: 0 auto; }
  .cta-section h2 {
    font-size: clamp(34px, 4vw, 58px);
    font-weight: 900;
    line-height: 1.06;
    letter-spacing: -0.035em;
    margin-bottom: 20px;
  }
  .cta-section p {
    color: rgba(0, 0, 0, 0.62);
    font-size: 18px;
    line-height: 1.65;
    margin-bottom: 36px;
  }
  .cta-btns { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; }

  footer {
    background: var(--gray-900);
    padding: 40px 56px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
  }
  .footer-logo img { height: 30px; opacity: 0.65; display: block; }
  .footer-copy { color: #6b7280; font-size: 13px; }
  .footer-links {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 18px 24px;
  }
  .footer-links a {
    color: #6b7280;
    text-decoration: none;
    font-size: 13px;
    transition: color 0.2s;
  }
  .footer-links a:hover { color: var(--white); }
  .social-links {
    display: flex;
    align-items: center;
    gap: 16px;
    padding-left: 22px;
    border-left: 1px solid rgba(255, 255, 255, 0.2);
  }
  .social-links a {
    display: flex;
    align-items: center;
    color: #6b7280;
  }

  @media (max-width: 1080px) {
    header { padding: 20px 28px; grid-template-columns: auto 1fr; }
    .nav-pill { justify-self: end; max-width: calc(100vw - 160px); overflow-x: auto; border-radius: 18px; }
    .nav-links > li > a { padding: 14px 13px; font-size: 11px; }
    .product-grid,
    .decision-grid { grid-template-columns: 1fr; }
    .compare-row { grid-template-columns: 1fr; }
    .compare-cell { border-right: 0; border-bottom: 1px solid var(--gray-100); }
    .compare-cell:last-child { border-bottom: 0; }
  }
  @media (max-width: 760px) {
    header { position: absolute; padding: 22px 20px; display: flex; justify-content: space-between; }
    .header-logo img { height: 42px; }
    .nav-pill { display: none; }
    .products-hero { min-height: 760px; padding: 112px 22px 68px; }
    .section,
    .section.dark,
    .cta-section { padding: 76px 22px; }
    .product-card { min-height: auto; grid-template-rows: 260px 1fr; }
    .product-body { padding: 26px; }
    footer { flex-direction: column; align-items: flex-start; padding: 32px 22px; }
    .social-links { padding-left: 0; border-left: 0; }
  }
</style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
  <?php include __DIR__ . '/includes/google-tag.php'; ?>
</head>
<body>
<?php include __DIR__ . '/includes/header.php'; ?>


<main>
  <section class="products-hero">
    <div class="hero-inner">
      <div class="eyebrow">sam&reg; Product Line</div>
      <h1 class="hero-title">Choose your <span>sustained acoustic medicine</span> platform.</h1>
      <p class="hero-copy">
        Explore the sam&reg; wearable ultrasound products side by side. Start here, compare the treatment fit, then open the product page that matches the patient, provider, or program need.
      </p>
    </div>
  </section>

  <section class="section" id="products">
    <div class="inner">
      <div class="section-header center">
        <div class="section-tag">Product Selector</div>
        <h2 class="section-title">Three products. One clinical purpose: portable multi-hour ultrasound therapy.</h2>
        <p class="section-desc">Each product supports sustained acoustic medicine, with a different product story and deployment fit.</p>
      </div>

      <div class="product-grid">
        <article class="product-card">
          <div class="product-media">
            <div class="product-badge">Established platform</div>
            <img src="assets/products/SAM_2.0_Hero.png" alt="sam 2.0 wearable ultrasound therapy device"/>
          </div>
          <div class="product-body">
            <div class="product-kicker">sam&reg; 2.0</div>
            <h2>Wearable therapy for daily recovery routines.</h2>
            <p>sam&reg; 2.0 is the sustained acoustic medicine platform for prescription home treatment, soft-tissue repair support, and continuity between clinic and daily use.</p>
            <ul class="feature-list">
              <li>Multi-hour low-intensity ultrasound treatment</li>
              <li>Patch-based coupling for daily home use</li>
              <li>Designed for pain, function, and soft-tissue recovery plans</li>
              <li>Clear fit for patients building a consistent recovery routine</li>
            </ul>
            <div class="product-actions">
              <a class="btn-primary" href="sam-2-0.php">View sam&reg; 2.0</a>
            </div>
          </div>
        </article>

        <article class="product-card">
          <div class="product-media">
            <div class="product-badge">Next evolution</div>
            <img src="assets/products/SAM_3.0_Hero.png" alt="sam 3.0 wearable ultrasound therapy system"/>
          </div>
          <div class="product-body">
            <div class="product-kicker">sam&reg; 3.0</div>
            <h2>Recovery designed for movement and daily wear.</h2>
            <p>sam&reg; 3.0 builds on the proven sam&reg; 2.0 technology platform with longer battery life, faster charging, silent operation, and adaptive applicators.</p>
            <ul class="feature-list">
              <li>Up to 6 hours of continuous therapy</li>
              <li>Faster charging and LED light indicators</li>
              <li>Quiet experience with no buzzing between sessions</li>
              <li>Low-profile design for wearing under clothing</li>
            </ul>
            <div class="product-actions">
              <a class="btn-primary" href="sam-3-0.php">View sam&reg; 3.0</a>
            </div>
          </div>
        </article>

        <article class="product-card">
          <div class="product-media">
            <div class="product-badge">Wireless system</div>
            <img src="assets/products/SAM_X1_Hero.png" alt="sam x1 wireless wearable ultrasound system"/>
          </div>
          <div class="product-body">
            <div class="product-kicker">sam&reg; X1</div>
            <h2>Wireless treatment built for modern deployment.</h2>
            <p>sam&reg; X1 is the latest wireless product experience, built for prescription home use, professional programs, military applications, and streamlined treatment workflows.</p>
            <ul class="feature-list">
              <li>Wireless wearable prescription ultrasound device</li>
              <li>Single-touch use and rapid charge support</li>
              <li>Rugged housing for demanding clinical and program environments</li>
              <li>Accessory ecosystem for charging, storage, and deployment</li>
            </ul>
            <div class="product-actions">
              <a class="btn-primary" href="sam-x1-page.php">View sam&reg; X1</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="section alt">
    <div class="inner">
      <div class="section-header center">
        <div class="section-tag">Quick Compare</div>
        <h2 class="section-title">Find the right treatment pathway faster.</h2>
      </div>
      <div class="compare-board">
        <div class="compare-row compare-head">
          <div class="compare-cell compare-label">Question</div>
          <div class="compare-cell">sam&reg; 2.0</div>
          <div class="compare-cell">sam&reg; 3.0</div>
          <div class="compare-cell">sam&reg; X1</div>
        </div>
        <div class="compare-row">
          <div class="compare-cell compare-label">Best first fit</div>
          <div class="compare-cell">Patients and providers focused on established wearable home treatment routines.</div>
          <div class="compare-cell">Active users who need longer battery life, quiet daily wear, and adaptable comfort.</div>
          <div class="compare-cell">Programs that want wireless convenience, rapid charging, and modern deployment accessories.</div>
        </div>
        <div class="compare-row">
          <div class="compare-cell compare-label">Treatment story</div>
          <div class="compare-cell">Consistent multi-hour therapy for soft-tissue repair, pain reduction, and recovery support.</div>
          <div class="compare-cell">Refined long-duration ultrasound therapy designed to support recovery throughout the day.</div>
          <div class="compare-cell">Wireless sustained acoustic medicine for arthritis, chronic injuries, and professional care environments.</div>
        </div>
        <div class="compare-row">
          <div class="compare-cell compare-label">Product emphasis</div>
          <div class="compare-cell">Daily usability, patch-based coupling, and continuity from clinic to home.</div>
          <div class="compare-cell">Everyday wearability, faster charging, LED indicators, and adaptive applicators.</div>
          <div class="compare-cell">Single-touch operation, rugged product design, and accessory-supported scaling.</div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-section">
    <div class="cta-inner">
      <h2>Need help choosing?</h2>
      <p>Contact the sam&reg; team and we will help identify the right product path for treatment, training, or program deployment.</p>
      <div class="cta-btns">
        <a class="btn-dark" href="contact-us.php">Contact Us</a>
        <a class="btn-outline" href="clinical-studies.php">Clinical Studies</a>
      </div>
    </div>
  </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
<script src="assets/header-config.js?v=20260911-1"></script>
</body>
</html>
