<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . '/includes/google-tag.php'; ?>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>sam&reg; Technology | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
<meta name="description" content="Explore sam technology, wearable multi-hour ultrasound therapy designed to support pain relief and soft tissue healing."/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<style>
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
  :root {
    --green: #c2d500;
    --green-deep: #a9bb00;
    --green-bg: #f7fbe7;
    --green-pale: #e7ef9d;
    --black: #000000;
    --gray-950: #0b0f14;
    --gray-900: #111827;
    --gray-700: #374151;
    --gray-500: #939598;
    --gray-300: #d1d5db;
    --gray-100: #f3f4f6;
    --gray-50: #f9fafb;
    --white: #ffffff;
  }

  html { scroll-behavior: smooth; }
  body {
    font-family: "Inter", sans-serif;
    background: var(--white);
    color: var(--black);
    overflow-x: hidden;
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
    font-weight: 700;
    padding: 16px 18px;
    display: block;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    transition: color 0.2s;
    white-space: nowrap;
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
  .dropdown li { list-style: none; position: relative; }
  .dropdown a {
    color: var(--gray-700);
    text-decoration: none;
    font-size: 14px;
    font-weight: 900;
    padding: 10px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.2s;
  }
  .dropdown a:hover,
  .dropdown a.active { color: var(--green-deep); background: var(--gray-50); }
  .dropdown .sub-dropdown {
    position: absolute;
    top: -12px;
    left: 100%;
    transform: translateX(10px);
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(24px);
    border: 1px solid var(--gray-300);
    border-radius: 16px;
    padding: 12px 0;
    min-width: 200px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  }
  .dropdown li:hover > .sub-dropdown {
    opacity: 1;
    visibility: visible;
    transform: translateX(4px);
  }

  .page-hero {
    padding: 142px 56px 92px;
    background:
      radial-gradient(circle at 84% 18%, rgba(194, 213, 0, 0.16), transparent 30%),
      linear-gradient(180deg, var(--white) 0%, var(--gray-50) 100%);
  }
  .hero-inner {
    max-width: 1280px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 0.92fr;
    gap: 80px;
    align-items: center;
  }
  .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--green-bg);
    border: 1px solid var(--green-pale);
    color: var(--green-deep);
    padding: 7px 16px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 24px;
  }
  .hero-title {
    font-size: clamp(40px, 5vw, 72px);
    font-weight: 900;
    line-height: 1.02;
    letter-spacing: -0.04em;
    margin-bottom: 24px;
  }
  .accent { color: var(--green-deep); }
  .hero-copy {
    font-size: 18px;
    color: var(--gray-500);
    line-height: 1.75;
    max-width: 650px;
    margin-bottom: 40px;
  }
  .hero-actions { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 44px; }
  .btn-primary,
  .btn-outline,
  .btn-white,
  .btn-bordered {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 48px;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 800;
    text-decoration: none;
    transition: all 0.2s;
  }
  .btn-primary {
    background: var(--green);
    color: var(--black);
    padding: 14px 32px;
    box-shadow: 0 8px 24px rgba(194, 213, 0, 0.24);
  }
  .btn-primary:hover { background: var(--green-deep); transform: translateY(-1px); }
  .btn-outline {
    background: transparent;
    color: var(--black);
    border: 2px solid var(--gray-300);
    padding: 12px 30px;
  }
  .btn-outline:hover { border-color: var(--green); color: var(--green-deep); }
  .hero-trust {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
  }
  .trust-badge {
    background: var(--white);
    border: 1px solid var(--gray-300);
    border-radius: 8px;
    padding: 9px 16px;
    font-size: 12px;
    font-weight: 800;
    color: var(--gray-700);
  }
  .hero-visual {
    position: relative;
    width: 100%;
  }
  .video-presentation-card {
    background: var(--white);
    border: 2px solid var(--green-pale);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.12);
    display: flex;
    flex-direction: column;
  }
  .vpc-header {
    background: var(--gray-50);
    padding: 18px 24px;
    display: flex;
    align-items: center;
    gap: 14px;
    border-bottom: 1px solid var(--gray-200);
  }
  .vpc-badge {
    background: var(--green);
    color: var(--black);
    font-size: 18px;
    font-weight: 900;
    padding: 6px 16px;
    border-radius: 100px;
    box-shadow: 0 4px 14px rgba(194, 213, 0, 0.25);
    letter-spacing: -0.02em;
  }
  .vpc-title {
    font-size: 15px;
    font-weight: 800;
    color: var(--gray-700);
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }
  .vpc-media {
    position: relative;
    aspect-ratio: 16 / 9;
    width: 100%;
    background: var(--black);
  }
  .vpc-media video {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
  }
  .vpc-footer {
    background: var(--gray-900);
    color: var(--white);
    padding: 32px 40px;
    position: relative;
  }
  .vpc-kicker {
    color: var(--green);
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin-bottom: 10px;
  }
  .vpc-main-text {
    font-size: 22px;
    font-weight: 900;
    line-height: 1.35;
    margin-bottom: 24px;
    letter-spacing: -0.01em;
  }
  .wave-line {
    height: 58px;
    border-radius: 14px;
    background:
      linear-gradient(90deg, transparent 0 8%, rgba(194, 213, 0, 0.24) 8% 10%, transparent 10% 18%),
      repeating-linear-gradient(90deg, rgba(194, 213, 0, 0.22) 0 2px, transparent 2px 24px),
      #1f2937;
    position: relative;
    overflow: hidden;
  }
  .wave-line::after {
    content: "";
    position: absolute;
    left: 18px;
    right: 18px;
    top: 50%;
    height: 3px;
    border-radius: 999px;
    background: var(--green);
    box-shadow: 0 0 22px rgba(194, 213, 0, 0.7);
  }

  .section {
    padding: 100px 56px;
  }
  .section.alt { background: var(--gray-50); }
  .section.green { background: var(--green-bg); }
  .inner { max-width: 1180px; margin: 0 auto; }
  .section-header {
    max-width: 760px;
    margin-bottom: 54px;
  }
  .section-header.center {
    text-align: center;
    margin-left: auto;
    margin-right: auto;
  }
  .section-tag {
    color: var(--green-deep);
    font-size: 13px;
    font-weight: 900;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin-bottom: 12px;
  }
  .section-title {
    font-size: clamp(30px, 3.7vw, 50px);
    font-weight: 900;
    letter-spacing: -0.035em;
    line-height: 1.08;
    color: var(--black);
  }
  .section-desc {
    color: var(--gray-500);
    font-size: 17px;
    line-height: 1.7;
    margin-top: 18px;
  }

  .dose-layout {
    display: grid;
    grid-template-columns: 0.9fr 1.1fr;
    gap: 56px;
    align-items: center;
  }
  .dose-card {
    background: var(--white);
    border: 1px solid var(--green-pale);
    border-radius: 22px;
    padding: 34px;
    box-shadow: 0 12px 40px rgba(194, 213, 0, 0.12);
  }
  .dose-main {
    display: grid;
    grid-template-columns: 120px 1fr;
    gap: 24px;
    align-items: center;
    padding-bottom: 26px;
    border-bottom: 1px solid var(--gray-100);
    margin-bottom: 26px;
  }
  .dose-orb {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--green);
    color: var(--black);
    font-size: 31px;
    font-weight: 900;
    letter-spacing: -0.04em;
    box-shadow: inset 0 0 0 12px rgba(255, 255, 255, 0.35);
  }
  .dose-main h2 { font-size: 27px; line-height: 1.1; letter-spacing: -0.02em; margin-bottom: 8px; }
  .dose-main p,
  .dose-note { color: var(--gray-500); line-height: 1.65; font-size: 15px; }
  .bar-list { display: flex; flex-direction: column; gap: 18px; }
  .bar-row { display: grid; grid-template-columns: 165px 1fr 86px; gap: 14px; align-items: center; }
  .bar-label { font-size: 13px; color: var(--gray-700); font-weight: 800; line-height: 1.35; }
  .bar-track {
    height: 14px;
    background: var(--gray-100);
    border-radius: 100px;
    overflow: hidden;
  }
  .bar-fill {
    height: 100%;
    background: var(--green);
    border-radius: inherit;
    box-shadow: 0 0 18px rgba(194, 213, 0, 0.35);
  }
  .bar-fill.small { background: var(--gray-300); box-shadow: none; }
  .bar-value { font-size: 13px; color: var(--gray-700); font-weight: 900; text-align: right; }

  .mechanism-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
  }
  .mechanism-card {
    background: var(--white);
    border: 1px solid var(--gray-100);
    border-radius: 16px;
    padding: 28px;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
    transition: all 0.25s;
  }
  .mechanism-card:hover {
    transform: translateY(-5px);
    border-color: var(--green-pale);
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.08);
  }
  .mechanism-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: var(--green);
    color: var(--black);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 900;
    margin-bottom: 20px;
  }
  .mechanism-card h3 { font-size: 18px; font-weight: 900; margin-bottom: 10px; letter-spacing: -0.015em; }
  .mechanism-card p { color: var(--gray-500); font-size: 14px; line-height: 1.65; }

  .comparison-wrap {
    border-radius: 20px;
    border: 1px solid var(--gray-300);
    overflow-x: auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    background: var(--white);
  }
  .comparison-table {
    width: 100%;
    min-width: 900px;
    border-collapse: collapse;
    text-align: left;
    font-size: 14px;
  }
  .comparison-table th,
  .comparison-table td {
    padding: 18px 20px;
    border-bottom: 1px solid var(--gray-300);
    vertical-align: middle;
  }
  .comparison-table th {
    font-size: 12px;
    font-weight: 900;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--black);
    background: var(--gray-100);
  }
  .comparison-table th:nth-child(2),
  .comparison-table td:nth-child(2) {
    background: var(--green);
    color: var(--black);
    font-weight: 800;
  }
  .comparison-table tbody tr:last-child td { border-bottom: 0; }
  .comparison-table td:first-child { font-weight: 800; color: var(--black); background: var(--gray-50); }
  .yes { color: #0f766e; font-weight: 900; }
  .no { color: #9ca3af; font-weight: 800; }

  .video-band {
    background: var(--gray-900);
    color: var(--white);
    padding: 100px 56px;
  }
  .video-layout {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 0.8fr 1.2fr;
    gap: 54px;
    align-items: center;
  }
  .video-band .section-title { color: var(--white); }
  .video-band .section-desc { color: rgba(255, 255, 255, 0.68); }
  .video-card {
    background: #05070a;
    border-radius: 22px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.12);
    box-shadow: 0 24px 70px rgba(0, 0, 0, 0.28);
  }
  .video-card video {
    width: 100%;
    height: 390px;
    object-fit: cover;
    display: block;
  }
  .video-caption {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 18px;
    align-items: center;
    padding: 20px 22px;
  }
  .video-caption h3 { font-size: 17px; font-weight: 900; margin-bottom: 4px; }
  .video-caption p { color: rgba(255, 255, 255, 0.56); font-size: 13px; line-height: 1.5; }
  .play-chip {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: var(--green);
    color: var(--black);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
  }

  .steps {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
  }
  .step-card {
    background: var(--white);
    border: 1px solid var(--green-pale);
    border-radius: 16px;
    padding: 26px;
  }
  .step-number {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: var(--green);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
    margin-bottom: 18px;
  }
  .step-card h3 { font-size: 17px; font-weight: 900; margin-bottom: 8px; }
  .step-card p { font-size: 14px; color: var(--gray-500); line-height: 1.6; }

  .cta-section {
    background: var(--black);
    padding: 118px 56px;
    text-align: center;
  }
  .cta-inner { max-width: 760px; margin: 0 auto; }
  .cta-section h2 {
    color: var(--white);
    font-size: clamp(32px, 4vw, 56px);
    font-weight: 900;
    line-height: 1.08;
    letter-spacing: -0.035em;
    margin-bottom: 18px;
  }
  .cta-section p {
    color: #94a3b8;
    font-size: 18px;
    line-height: 1.65;
    margin-bottom: 42px;
  }
  .cta-btns { display: flex; justify-content: center; gap: 16px; flex-wrap: wrap; }
  .btn-white {
    background: var(--green);
    color: var(--black);
    padding: 16px 36px;
  }
  .btn-white:hover { background: var(--green-deep); transform: translateY(-1px); }
  .btn-bordered {
    color: var(--white);
    border: 2px solid rgba(255, 255, 255, 0.25);
    padding: 14px 34px;
  }
  .btn-bordered:hover { border-color: var(--white); background: rgba(255, 255, 255, 0.07); }

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
  .footer-links a {
    color: #6b7280;
    text-decoration: none;
    font-size: 13px;
    margin-left: 24px;
    transition: color 0.2s;
  }
  .footer-links a:hover { color: var(--white); }

  .reveal { opacity: 0; transform: translateY(28px); }

  @media (max-width: 1080px) {
    header { padding: 20px 28px; grid-template-columns: auto 1fr; }
    .nav-pill { justify-self: end; max-width: calc(100vw - 160px); overflow-x: auto; border-radius: 18px; }
    .nav-links > li > a { padding: 14px 13px; font-size: 11px; }
    .hero-inner,
    .dose-layout,
    .video-layout { grid-template-columns: 1fr; gap: 44px; }
    .hero-visual { min-height: auto; }
    .steps { grid-template-columns: repeat(2, 1fr); }
  }
  @media (max-width: 760px) {
    header { position: absolute; padding: 22px 20px; display: flex; justify-content: space-between; }
    .header-logo img { height: 42px; }
    .nav-pill { display: none; }
    .page-hero { padding: 112px 22px 72px; }
    .section,
    .video-band,
    .cta-section { padding: 76px 22px; }
    .hero-title { font-size: clamp(38px, 13vw, 58px); }
    .hero-copy { font-size: 16px; }
    .vpc-media { aspect-ratio: 16 / 9; }
    .vpc-footer { padding: 24px; }
    .vpc-main-text { font-size: 18px; }
    .vpc-header { flex-direction: column; align-items: flex-start; gap: 8px; }
    .dose-card { padding: 24px; }
    .dose-main,
    .bar-row { grid-template-columns: 1fr; }
    .dose-orb { width: 104px; height: 104px; }
    .bar-value { text-align: left; }
    .mechanism-grid,
    .steps { grid-template-columns: 1fr; }
    .video-card video { height: 260px; }
    footer { flex-direction: column; align-items: flex-start; padding: 32px 22px; }
    .footer-links a { margin-left: 0; margin-right: 18px; }
  }
</style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
</head>
<body>
<?php include __DIR__ . '/includes/header.php'; ?>


<main>
  <section class="page-hero">
    <div class="hero-inner">
      <div class="hero-content reveal" id="heroText">
        <div class="eyebrow">sam&reg; Technology</div>
        <h1 class="hero-title">Wearable ultrasound built for <span class="accent">multi-hour healing.</span></h1>
        <p class="hero-copy">
          sam&reg; delivers Sustained Acoustic Medicine: long-duration, low-intensity ultrasound designed to amplify the body's natural healing response, improve local circulation, and reduce the inflammatory source of pain.
        </p>
        <div class="hero-actions">
          <a class="btn-primary" href="#dose">See Treatment Dose</a>
          <a class="btn-outline" href="#comparison">Compare Therapies</a>
        </div>
        <div class="hero-trust">
          <div class="trust-badge">Prescription Required</div>
          <div class="trust-badge">Wearable & Portable</div>
          <div class="trust-badge">Drug-Free Therapy</div>
        </div>
      </div>
      <div class="hero-visual reveal" id="heroVisual">
        <div class="video-presentation-card">
          <div class="vpc-header">
            <div class="vpc-badge">4 hrs</div>
            <div class="vpc-title">daily home ultrasound therapy</div>
          </div>
          <div class="vpc-media">
            <video autoplay muted loop playsinline preload="metadata">
              <source src="assets/videos/sam-technology-mobile.mp4" media="(max-width: 767px)" type="video/mp4"/>
              <source src="assets/videos/sam-technology-720p.mp4" type="video/mp4"/>
            </video>
          </div>
          <div class="vpc-footer">
            <div class="vpc-kicker">Sustained Acoustic Medicine</div>
            <div class="vpc-main-text">Continuous ultrasound energy, delivered comfortably during daily life.</div>
            <div class="wave-line" aria-hidden="true"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section green" id="dose">
    <div class="inner dose-layout">
      <div class="section-header reveal">
        <div class="section-tag">Dose Matters</div>
        <h2 class="section-title">Treatment dose impacts clinical outcome.</h2>
        <p class="section-desc">
          The previous page highlighted the key advantage of sam&reg;: sustained home treatment delivers far more therapeutic energy than short ultrasound sessions.
        </p>
      </div>
      <div class="dose-card reveal">
        <div class="dose-main">
          <div class="dose-orb">18K+</div>
          <div>
            <h2>18,270+ joules over a 4-hour session</h2>
            <p>sam&reg; provides daily, wearable ultrasound therapy for multi-hour treatment windows.</p>
          </div>
        </div>
        <div class="bar-list" aria-label="Treatment energy comparison">
          <div class="bar-row">
            <div class="bar-label">sam&reg; home ultrasound</div>
            <div class="bar-track"><div class="bar-fill" style="width:100%"></div></div>
            <div class="bar-value">18,270 J</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">Doctor's office ultrasound</div>
            <div class="bar-track"><div class="bar-fill small" style="width:11%"></div></div>
            <div class="bar-value">2,000 J</div>
          </div>
          <div class="bar-row">
            <div class="bar-label">LIPUS home ultrasound</div>
            <div class="bar-track"><div class="bar-fill small" style="width:1%"></div></div>
            <div class="bar-value">140 J</div>
          </div>
        </div>
        <p class="dose-note" style="margin-top:24px;">Values are presented from the prior SAM Technology page content for design continuity.</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="inner">
      <div class="section-header center reveal">
        <div class="section-tag">How It Works</div>
        <h2 class="section-title">Acoustic energy that supports the healing environment.</h2>
        <p class="section-desc">
          sam&reg; is not a pain-blocking approach. It is designed to address the underlying healing process through continuous ultrasound effects.
        </p>
      </div>
      <div class="mechanism-grid">
        <article class="mechanism-card reveal">
          <div class="mechanism-icon">01</div>
          <h3>Reduces the cause of pain</h3>
          <p>Supports tissue recovery by targeting the inflammatory response rather than simply masking discomfort.</p>
        </article>
        <article class="mechanism-card reveal">
          <div class="mechanism-icon">02</div>
          <h3>Accelerates natural healing</h3>
          <p>Long-duration ultrasound stimulation helps the body's repair processes work with greater consistency.</p>
        </article>
        <article class="mechanism-card reveal">
          <div class="mechanism-icon">03</div>
          <h3>Provides deep heat</h3>
          <p>Therapeutic ultrasound can create gentle deep-tissue warmth to support comfort and mobility.</p>
        </article>
        <article class="mechanism-card reveal">
          <div class="mechanism-icon">04</div>
          <h3>Delivers mechanical compression</h3>
          <p>Acoustic pressure waves create a mechanical effect within soft tissue during treatment.</p>
        </article>
        <article class="mechanism-card reveal">
          <div class="mechanism-icon">05</div>
          <h3>Increases oxygen and nutrient delivery</h3>
          <p>Improved local circulation helps bring resources needed for tissue repair to the treatment area.</p>
        </article>
        <article class="mechanism-card reveal">
          <div class="mechanism-icon">06</div>
          <h3>Supports daily multi-hour therapy</h3>
          <p>The wearable format allows patients to receive therapy at home, at work, or while moving through normal routines.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="video-band">
    <div class="video-layout">
      <div class="section-header reveal" style="margin-bottom:0;">
        <div class="section-tag">Mechanism of Action</div>
        <h2 class="section-title">A portable treatment experience, not a clinic-only session.</h2>
        <p class="section-desc">
          The technology page previously used mechanism and gel-capture video content. This redesigned section keeps that story but makes the page feel aligned with the new clinical-trust home design.
        </p>
      </div>
      <div class="video-card reveal">
        <video class="lazy-video" muted loop playsinline preload="none"
          poster="assets/videos/sam-technology-2-poster.jpg">
          <source data-src="assets/videos/sam-technology-2-mobile.mp4" media="(max-width: 767px)" type="video/mp4"/>
          <source data-src="assets/videos/sam-technology-2-720p.mp4" type="video/mp4"/>
        </video>
        <div class="video-caption">
          <div>
            <h3>sam&reg; wearable ultrasound treatment</h3>
            <p>Compact device, comfortable applicators, and daily therapy designed around patient life.</p>
          </div>
          <div class="play-chip" aria-hidden="true">II</div>
        </div>
      </div>
    </div>
  </section>

  <section class="section alt" id="comparison">
    <div class="inner">
      <div class="section-header center reveal">
        <div class="section-tag">Technology Comparison</div>
        <h2 class="section-title">Why sustained ultrasound stands apart.</h2>
        <p class="section-desc">
          Compared with injections, braces, stimulation devices, and cold compression, sam&reg; combines active healing support with a wearable multi-hour format.
        </p>
      </div>
      <div class="comparison-wrap reveal">
        <table class="comparison-table">
          <thead>
            <tr>
              <th>Capability</th>
              <th>sam&reg; Ultrasound</th>
              <th>Joint Injections</th>
              <th>Bracing</th>
              <th>Stim / Cold Compression</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Prescription oversight</td>
              <td>Prescription required</td>
              <td>Prescription required</td>
              <td>Often over the counter</td>
              <td>Often over the counter</td>
            </tr>
            <tr>
              <td>Reduces cause of pain</td>
              <td><span class="yes">Yes</span></td>
              <td>Varies by treatment</td>
              <td><span class="no">Limited</span></td>
              <td><span class="no">Limited</span></td>
            </tr>
            <tr>
              <td>Accelerates natural healing</td>
              <td><span class="yes">Yes</span></td>
              <td>Varies by treatment</td>
              <td><span class="no">No</span></td>
              <td><span class="no">Limited</span></td>
            </tr>
            <tr>
              <td>Provides deep heat</td>
              <td><span class="yes">Yes</span></td>
              <td><span class="no">No</span></td>
              <td><span class="no">No</span></td>
              <td><span class="no">No</span></td>
            </tr>
            <tr>
              <td>Mechanical compression effect</td>
              <td><span class="yes">Yes</span></td>
              <td><span class="no">No</span></td>
              <td>External support only</td>
              <td>External compression only</td>
            </tr>
            <tr>
              <td>Increases oxygen and nutrient delivery</td>
              <td><span class="yes">Yes</span></td>
              <td>Varies by treatment</td>
              <td><span class="no">No</span></td>
              <td><span class="no">Limited</span></td>
            </tr>
            <tr>
              <td>Daily multi-hour therapy</td>
              <td><span class="yes">Yes</span></td>
              <td><span class="no">No</span></td>
              <td>Passive daily support</td>
              <td>Session-based</td>
            </tr>
            <tr>
              <td>Wearable and portable</td>
              <td><span class="yes">Yes</span></td>
              <td><span class="no">No</span></td>
              <td><span class="yes">Yes</span></td>
              <td>Depends on device</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section class="section green">
    <div class="inner">
      <div class="section-header center reveal">
        <div class="section-tag">Patient Flow</div>
        <h2 class="section-title">Designed for therapy beyond the appointment.</h2>
      </div>
      <div class="steps">
        <article class="step-card reveal">
          <div class="step-number">1</div>
          <h3>Provider evaluation</h3>
          <p>A healthcare provider determines whether sam&reg; is appropriate for the patient's condition.</p>
        </article>
        <article class="step-card reveal">
          <div class="step-number">2</div>
          <h3>Prescription setup</h3>
          <p>The patient receives guidance for placing applicators and running the treatment session.</p>
        </article>
        <article class="step-card reveal">
          <div class="step-number">3</div>
          <h3>Daily treatment</h3>
          <p>Wearable therapy supports multi-hour use while the patient continues normal routines.</p>
        </article>
        <article class="step-card reveal">
          <div class="step-number">4</div>
          <h3>Recovery progress</h3>
          <p>The treatment plan supports reduced pain, improved mobility, and soft tissue healing over time.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="cta-section">
    <div class="cta-inner reveal">
      <h2>Bring sustained ultrasound into your recovery plan.</h2>
      <p>Ask your healthcare provider whether prescription sam&reg; treatment is right for your injury, chronic pain, or post-operative recovery.</p>
      <div class="cta-btns">
    <a class="btn-white" href="https://samsport.com/" target="_blank" rel="noopener">Order sam&reg;</a>
        <a class="btn-bordered" href="clinical-studies.php" target="_blank" rel="noopener">View Clinical Studies</a>
      </div>
    </div>
  </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>


<script>
  if (window.gsap && window.ScrollTrigger) {
    gsap.registerPlugin(ScrollTrigger);

    gsap.timeline({ delay: 0.25 })
      .to("#heroText", { opacity: 1, y: 0, duration: 0.8, ease: "power3.out" })
      .to("#heroVisual", { opacity: 1, y: 0, duration: 0.8, ease: "power3.out" }, "-=0.55");

    document.querySelectorAll(".reveal").forEach((el) => {
      if (el.id === "heroText" || el.id === "heroVisual") return;
      gsap.to(el, {
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: "power3.out",
        scrollTrigger: {
          trigger: el,
          start: "top 82%",
          once: true
        }
      });
    });
  } else {
    document.querySelectorAll(".reveal").forEach((el) => {
      el.style.opacity = "1";
      el.style.transform = "none";
    });
  }
</script>
  <script src="assets/lazy-video.js" defer></script>
  <script src="assets/header-config.js?v=20260911-1"></script>
</body>
</html>









