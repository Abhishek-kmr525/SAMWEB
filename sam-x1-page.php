<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . '/includes/google-tag.php'; ?>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>sam&reg; X1 | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
<meta name="description" content="Explore sam X1, a wireless prescription home-use ultrasound therapy device designed for arthritis, chronic injuries, and soft tissue repair."/>
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

  .product-hero {
    position: relative;
    min-height: 100vh;
    padding: 128px 56px 190px;
    background:
      linear-gradient(90deg, var(--ink) 0 54%, var(--white) 54% 100%);
    display: grid;
    align-items: center;
  }
  .hero-shell {
    max-width: 1280px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 0.82fr 1.18fr;
    gap: 60px;
    align-items: center;
  }
  .hero-copy { color: var(--white); }
  .eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
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
    font-size: clamp(48px, 6.2vw, 92px);
    font-weight: 900;
    line-height: 0.96;
    letter-spacing: -0.055em;
    margin-bottom: 26px;
  }
  .hero-title span { color: var(--green); }
  .hero-copy p {
    color: rgba(255, 255, 255, 0.68);
    font-size: 18px;
    line-height: 1.75;
    max-width: 550px;
    margin-bottom: 38px;
  }
  .hero-actions { display: flex; flex-wrap: wrap; gap: 14px; }
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
  .btn-outline {
    color: var(--white);
    border: 2px solid rgba(255, 255, 255, 0.2);
    padding: 12px 28px;
  }
  .btn-outline:hover { border-color: var(--white); background: rgba(255, 255, 255, 0.08); }
  .btn-dark {
    background: var(--ink);
    color: var(--white);
    padding: 14px 30px;
  }
  .btn-bordered {
    border: 2px solid rgba(255, 255, 255, 0.25);
    color: var(--white);
    padding: 12px 28px;
  }

  .product-stage {
    position: relative;
    min-height: 610px;
  }
  .video-frame {
    position: relative;
    border-radius: 28px;
    overflow: hidden;
    border: 10px solid var(--white);
    box-shadow: 0 34px 90px rgba(0, 0, 0, 0.22);
    aspect-ratio: 16 / 10;
    background: var(--black);
  }
  .video-frame video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .device-tag {
    position: absolute;
    top: 26px;
    left: -24px;
    background: var(--white);
    border: 1px solid var(--gray-100);
    border-radius: 16px;
    padding: 18px 22px;
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.14);
  }
  .device-tag strong { display: block; color: var(--black); font-size: 28px; line-height: 1; }
  .device-tag span { display: block; color: var(--gray-500); font-size: 12px; font-weight: 800; margin-top: 6px; }
  .spec-strip {
    position: absolute;
    left: 50%;
    bottom: 34px;
    width: min(1180px, calc(100% - 112px));
    transform: translateX(-50%);
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    padding: 16px;
    border-radius: 20px;
    background: var(--green);
    box-shadow: 0 22px 58px rgba(0, 0, 0, 0.18), 0 0 46px rgba(194, 213, 0, 0.34);
    border: 1px solid rgba(255, 255, 255, 0.82);
    z-index: 4;
  }
  .spec-pill {
    background: rgba(255, 255, 255, 0.72);
    border: 1px solid rgba(255, 255, 255, 0.78);
    border-radius: 12px;
    padding: 16px 14px 16px 46px;
    position: relative;
    min-height: 76px;
    overflow: hidden;
  }
  .spec-pill::before {
    content: attr(data-step);
    position: absolute;
    left: 14px;
    top: 16px;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--ink);
    color: var(--green);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 900;
    z-index: 1;
  }
  .spec-pill::after {
    content: "";
    position: absolute;
    right: -32px;
    bottom: -38px;
    width: 96px;
    height: 96px;
    border-radius: 50%;
    border: 18px solid rgba(0, 0, 0, 0.05);
  }
  .spec-pill b {
    display: block;
    color: var(--black);
    font-size: 13px;
    line-height: 1.25;
    margin-bottom: 4px;
    letter-spacing: -0.01em;
    position: relative;
    z-index: 1;
  }
  .spec-pill small {
    color: rgba(0, 0, 0, 0.62);
    font-size: 11px;
    line-height: 1.35;
    font-weight: 800;
    position: relative;
    z-index: 1;
  }

  .section {
    padding: 100px 56px;
  }
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
    letter-spacing: -0.04em;
  }
  .section-desc {
    color: var(--gray-500);
    font-size: 17px;
    line-height: 1.7;
    margin-top: 18px;
  }
  .dark .section-desc { color: rgba(255, 255, 255, 0.66); }

  .feature-board {
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 28px;
    align-items: stretch;
  }
  .feature-lead {
    background: var(--green);
    border-radius: 22px;
    padding: 42px;
    min-height: 410px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
    position: relative;
  }
  .feature-lead::after {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    right: -160px;
    bottom: -160px;
    border-radius: 50%;
    border: 60px solid rgba(255, 255, 255, 0.28);
  }
  .feature-lead h2 {
    max-width: 580px;
    font-size: clamp(32px, 4vw, 56px);
    font-weight: 900;
    line-height: 1.02;
    letter-spacing: -0.045em;
    position: relative;
    z-index: 1;
  }
  .feature-lead p {
    max-width: 600px;
    color: rgba(0, 0, 0, 0.68);
    font-size: 17px;
    line-height: 1.65;
    position: relative;
    z-index: 1;
  }
  .feature-stack { display: grid; gap: 18px; }
  .feature-card {
    background: var(--white);
    border: 1px solid var(--green-pale);
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05), 0 0 0 1px rgba(194, 213, 0, 0.16), 0 0 34px rgba(194, 213, 0, 0.12);
    transition: transform 0.25s, box-shadow 0.25s;
  }
  .feature-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.08), 0 0 42px rgba(194, 213, 0, 0.2);
  }
  .feature-card h3 { font-size: 19px; font-weight: 900; margin-bottom: 10px; letter-spacing: -0.015em; }
  .feature-card p { color: var(--gray-500); font-size: 14px; line-height: 1.65; }

  .patch-layout {
    display: grid;
    grid-template-columns: 0.9fr 1.1fr;
    gap: 54px;
    align-items: center;
  }
  .patch-visual {
    background:
      linear-gradient(145deg, rgba(194, 213, 0, 0.24), rgba(255, 255, 255, 0) 42%),
      var(--white);
    border: 1px solid var(--gray-100);
    border-radius: 28px;
    padding: 18px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
  }
  .patch-plate {
    min-height: 520px;
    border-radius: 24px;
    background:
      linear-gradient(135deg, rgba(194, 213, 0, 0.16), transparent 42%),
      radial-gradient(circle at 72% 20%, rgba(194, 213, 0, 0.32), transparent 28%),
      var(--green-soft);
    position: relative;
    overflow: hidden;
    box-shadow: inset 0 0 0 1px rgba(194, 213, 0, 0.22);
  }
  .patch-plate::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 3;
    background:
      linear-gradient(180deg, rgba(12, 17, 24, 0) 58%, rgba(12, 17, 24, 0.18) 100%),
      radial-gradient(circle at 18% 14%, rgba(194, 213, 0, 0.2), transparent 32%);
    pointer-events: none;
  }
  .patch-product-img {
    position: absolute;
    inset: 22px;
    z-index: 2;
    width: calc(100% - 44px);
    height: calc(100% - 44px);
    object-fit: contain;
    object-position: center;
    border-radius: 28px;
    filter: saturate(1.04) contrast(1.02);
  }
  .patch-device {
    display: none;
  }
  .check-list {
    display: grid;
    gap: 16px;
  }
  .check-item {
    display: grid;
    grid-template-columns: 46px 1fr;
    gap: 16px;
    align-items: start;
    padding: 22px;
    background: var(--white);
    border: 1px solid var(--gray-100);
    border-radius: 16px;
  }
  .check {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: var(--green);
    color: var(--black);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
  }
  .check-item h3 { font-size: 17px; font-weight: 900; margin-bottom: 6px; }
  .check-item p { color: var(--gray-500); font-size: 14px; line-height: 1.6; }

  .accessory-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
  }
  .accessory-card {
    border-radius: 22px;
    padding: 0;
    min-height: 330px;
    border: 1px solid rgba(255, 255, 255, 0.12);
    background: rgba(255, 255, 255, 0.05);
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
  }
  .accessory-media {
    height: 320px;
    background: var(--white);
    overflow: hidden;
    display: grid;
    place-items: center;
    padding: 18px;
  }
  .accessory-media img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: contain;
    transition: transform 0.35s;
  }
  .accessory-card:hover .accessory-media img { transform: scale(1.04); }
  .accessory-body { padding: 30px; }
  .accessory-card h3 { font-size: 26px; font-weight: 900; margin-bottom: 24px; letter-spacing: -0.025em; }
  .accessory-list { display: grid; gap: 14px; list-style: none; }
  .accessory-list li {
    color: rgba(255, 255, 255, 0.72);
    border-bottom: 1px solid rgba(255, 255, 255, 0.09);
    padding-bottom: 14px;
    font-size: 15px;
    line-height: 1.5;
  }
  .accessory-list li:last-child { border-bottom: 0; padding-bottom: 0; }

  .history-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }
  .history-logo-row {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 30px;
    margin: -18px auto 48px;
    flex-wrap: wrap;
  }
  .history-logo {
    width: 154px;
    height: 154px;
    border-radius: 50%;
    background: var(--white);
    border: 8px solid var(--white);
    box-shadow: 0 18px 48px rgba(0, 0, 0, 0.1), 0 0 0 1px var(--green-pale), 0 0 36px rgba(194, 213, 0, 0.16);
    overflow: hidden;
    position: relative;
  }
  .history-logo:nth-child(2) { transform: translateY(22px); }
  .history-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .history-card {
    background: var(--white);
    border: 1px solid var(--green-pale);
    border-radius: 18px;
    padding: 30px;
    min-height: 210px;
  }
  .history-card b {
    display: block;
    color: var(--green-deep);
    font-size: 38px;
    line-height: 1;
    margin-bottom: 18px;
  }
  .history-card h3 { font-size: 18px; font-weight: 900; margin-bottom: 9px; }
  .history-card p { color: var(--gray-500); font-size: 14px; line-height: 1.65; }

  .expert-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
  }
  .expert-card {
    background: var(--white);
    border: 1px solid var(--gray-100);
    border-radius: 18px;
    padding: 0;
    box-shadow: 0 8px 28px rgba(0, 0, 0, 0.05);
    overflow: hidden;
  }
  .expert-photo {
    height: 270px;
    overflow: hidden;
    background: var(--green-soft);
    display: grid;
    place-items: center;
    padding: 10px;
  }
  .expert-photo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
  }
  .expert-body { padding: 30px; }
  .quote-mark {
    color: var(--green-deep);
    font-size: 52px;
    line-height: 0.7;
    font-weight: 900;
    margin-bottom: 18px;
  }
  .expert-card blockquote {
    color: var(--gray-700);
    font-size: 15px;
    line-height: 1.65;
    margin-bottom: 24px;
    font-weight: 650;
  }
  .expert-card h3 { font-size: 17px; font-weight: 900; margin-bottom: 4px; }
  .expert-card p { color: var(--gray-500); font-size: 13px; line-height: 1.55; }

  .cta-section {
    background: var(--black);
    color: var(--white);
    padding: 110px 56px;
    text-align: center;
  }
  .cta-inner { max-width: 780px; margin: 0 auto; }
  .cta-section h2 {
    font-size: clamp(34px, 4vw, 58px);
    font-weight: 900;
    line-height: 1.06;
    letter-spacing: -0.04em;
    margin-bottom: 20px;
  }
  .cta-section p {
    color: #94a3b8;
    font-size: 18px;
    line-height: 1.65;
    margin-bottom: 40px;
  }
  .cta-btns { display: flex; justify-content: center; gap: 16px; flex-wrap: wrap; }
  .cta-form-card {
    max-width: 860px;
    margin: 42px auto 0;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 24px;
    padding: 32px;
    text-align: left;
  }
  .cta-form-card h3 {
    color: var(--white);
    font-size: 28px;
    margin-bottom: 10px;
  }
  .cta-form-card p {
    margin: 0 0 24px;
    max-width: none;
    font-size: 15px;
  }
  .cta-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
  }
  .cta-form-field label {
    display: block;
    margin-bottom: 8px;
    color: rgba(255,255,255,0.82);
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.1em;
  }
  .cta-form-field input,
  .cta-form-field textarea,
  .cta-form-field select {
    width: 100%;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.14);
    background: rgba(255,255,255,0.96);
    color: var(--ink);
    padding: 14px 16px;
    font: inherit;
  }
  .cta-form-field textarea {
    min-height: 132px;
    resize: vertical;
  }
  .cta-form-field.full {
    grid-column: 1 / -1;
  }

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

  @media (max-width: 1080px) {
    header { padding: 20px 28px; grid-template-columns: auto 1fr; }
    .nav-pill { justify-self: end; max-width: calc(100vw - 160px); overflow-x: auto; border-radius: 18px; }
    .nav-links > li > a { padding: 14px 13px; font-size: 11px; }
    .product-hero { background: var(--ink); min-height: auto; }
    .hero-shell,
    .feature-board,
    .patch-layout { grid-template-columns: 1fr; }
    .product-stage { min-height: auto; padding-bottom: 0; }
    .spec-strip { grid-template-columns: repeat(2, 1fr); }
    .history-grid,
    .expert-grid { grid-template-columns: 1fr; }
  }
  @media (max-width: 760px) {
    header { position: absolute; padding: 22px 20px; display: flex; justify-content: space-between; }
    .header-logo img { height: 42px; }
    .nav-pill { display: none; }
    .product-hero { padding: 112px 22px 72px; }
    .section,
    .section.dark,
    .cta-section { padding: 76px 22px; }
    .hero-title { font-size: clamp(44px, 16vw, 64px); }
    .video-frame { border-width: 6px; border-radius: 22px; aspect-ratio: 16 / 11; }
    .device-tag { position: static; width: 100%; margin-top: 16px; }
    .spec-strip { position: static; transform: none; width: 100%; grid-template-columns: 1fr; margin: 18px auto 0; }
    .feature-lead { padding: 30px; min-height: 360px; }
    .accessory-grid { grid-template-columns: 1fr; }
    .patch-visual { padding: 12px; }
    .patch-plate { min-height: 360px; }
    .history-logo { width: 124px; height: 124px; }
    .history-logo:nth-child(2) { transform: none; }
    .accessory-media,
    .expert-photo { height: 260px; }
    .cta-form-card { padding: 24px; }
    .cta-form-grid { grid-template-columns: 1fr; }
    footer { flex-direction: column; align-items: flex-start; padding: 32px 22px; }
    .footer-links a { margin-left: 0; margin-right: 18px; }
  }
</style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
</head>
<body>
<?php include __DIR__ . '/includes/header.php'; ?>

<main>
  <section class="product-hero">
    <div class="hero-shell">
      <div class="hero-copy">
        <div class="eyebrow">sam&reg; Ultrasound Products</div>
        <h1 class="hero-title">sam&reg; <span>X1</span></h1>
        <p>
          The latest medical innovation in mechanobiology to accelerate soft-tissue repair. sam&reg; X1 delivers sustained acoustic medicine in a convenient wireless wearable device approved for prescription home use.
        </p>
        <div class="hero-actions">
          <a class="btn-primary" href="#features">Explore X1 Features</a>
        </div>
      </div>
      <div class="product-stage">
        <div class="video-frame">
          <video autoplay muted loop playsinline preload="metadata">
            <source src="assets/videos/sam-x1-720p.mp4" type="video/mp4"/>
          </video>
        </div>
        <div class="device-tag">
          <strong>X1</strong>
          <span>wireless prescription device</span>
        </div>
      </div>
    </div>
    <div class="spec-strip" aria-label="sam X1 highlights">
      <div class="spec-pill" data-step="1"><b>Single-touch</b><small>simple daily control</small></div>
      <div class="spec-pill" data-step="2"><b>Wireless</b><small>wearable home use</small></div>
      <div class="spec-pill" data-step="3"><b>Rapid charge</b><small>intelligent controller</small></div>
      <div class="spec-pill" data-step="4"><b>Rugged</b><small>military-ready housing</small></div>
    </div>
  </section>

  <section class="section">
    <div class="inner patch-layout">
      <div class="patch-visual" aria-hidden="true">
        <div class="patch-plate">
          <img class="patch-product-img" src="https://pub-ce72dd6475514908a6d97cfa33c7af95.r2.dev/Untitled%20design%20(5).png" alt=""/>
          <div class="patch-device"></div>
        </div>
      </div>
      <div>
        <div class="section-header" style="margin-bottom:32px;">
          <div class="section-tag">sam&reg; Coupling Patches</div>
          <h2 class="section-title">Designed to keep treatment clean, comfortable, and consistent.</h2>
          <p class="section-desc">The X1 ecosystem includes patented coupling patches made for multi-hour ultrasound delivery and daily patient wear.</p>
        </div>
        <div class="check-list">
          <div class="check-item">
            <div class="check">1</div>
            <div>
              <h3>Multi-hour ultrasound coupling</h3>
              <p>Provides reliable coupling for sustained acoustic medicine treatment sessions.</p>
            </div>
          </div>
          <div class="check-item">
            <div class="check">2</div>
            <div>
              <h3>Daily wear without skin irritation</h3>
              <p>Patented technology supports repeated use with medical-grade adhesives.</p>
            </div>
          </div>
          <div class="check-item">
            <div class="check">3</div>
            <div>
              <h3>Gel-capture design</h3>
              <p>The gel-capture feature helps hold sam&reg; gel securely in place during application.</p>
            </div>
          </div>
          <div class="check-item">
            <div class="check">4</div>
            <div>
              <h3>Made in the USA</h3>
              <p>sam&reg; coupling patches use medical-grade adhesives by 3M&reg; Science.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section alt" id="features">
    <div class="inner">
      <div class="feature-board">
        <div class="feature-lead">
          <h2>Built for arthritis, chronic injuries, and prescription home treatment.</h2>
          <p>Developed with research supported by the National Institutes of Health and the United States Department of Defense, sam&reg; X1 is designed to make multi-hour ultrasound therapy easier to deliver outside the clinic.</p>
        </div>
        <div class="feature-stack">
          <article class="feature-card">
            <h3>Military-specified materials</h3>
            <p>Made with rugged housing and a USA-made fuel cell, making X1 a preferred option for veterans, military programs, and demanding clinical deployments.</p>
          </article>
          <article class="feature-card">
            <h3>Rapid charge intelligent controller</h3>
            <p>The integrated label and simplified controls support easier daily use and cleaning across home and professional settings.</p>
          </article>
          <article class="feature-card">
            <h3>Enhanced coupling patches</h3>
            <p>Gel-capture patches help maintain ultrasound coupling and simplify application for older patients and caregivers.</p>
          </article>
        </div>
      </div>
    </div>
  </section>



  <section class="cta-section">
    <div class="cta-inner">
      <h2>Are you ready to get sam&reg;?</h2>
      <p>Contact us now and the sam&reg; team will follow up with everything you need to begin your recovery journey.</p>
      <div class="cta-btns">
        <a class="btn-primary" href="contact-us.php">Contact Us</a>
        <a class="btn-bordered" href="assets/pdfs/SAM_X1_Product_Brochure_2022_Updated.pdf" target="_blank" rel="noopener">Download Spec Sheet</a>
        <a class="btn-bordered" href="assets/pdfs/LL-2825-00-Rev-A-sam-X1-Model-551-User-Manual-OM551.pdf" target="_blank" rel="noopener">sam&reg; X1 Manual</a>
      </div>
      <div class="cta-form-card" id="contact-form">
        <h3>Request Information</h3>
        <p>Fill out the form below and a representative will get back to you shortly.</p>
        <form action="submit-enquiry.php" method="POST" data-enquiry-form="true">
          <input type="hidden" name="redirect_to" value="sam-x1-page.php">
          <input type="hidden" name="form_source" value="sam-x1-page.php">
          <input type="text" name="website" value="" tabindex="-1" autocomplete="off" style="display:none">
          <div class="cta-form-grid">
            <div class="cta-form-field">
              <label for="x1-fname">First Name</label>
              <input id="x1-fname" type="text" name="fname" required>
            </div>
            <div class="cta-form-field">
              <label for="x1-lname">Last Name</label>
              <input id="x1-lname" type="text" name="lname" required>
            </div>
            <div class="cta-form-field">
              <label for="x1-email">Email Address</label>
              <input id="x1-email" type="email" name="email" required>
            </div>
            <div class="cta-form-field">
              <label for="x1-phone">Phone Number</label>
              <input id="x1-phone" type="tel" name="phone">
            </div>
            <div class="cta-form-field full">
              <label for="x1-inquiry">Inquiry Type</label>
              <select id="x1-inquiry" name="inquiry">
                <option value="patient">I am a Patient</option>
                <option value="provider">I am a Healthcare Provider</option>
                <option value="sales">Sales Inquiry</option>
                <option value="support">Technical Support</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="cta-form-field full">
              <label for="x1-message">Your Message</label>
              <textarea id="x1-message" name="message" required></textarea>
            </div>
            <div class="cta-form-field full">
              <button type="submit" class="btn-primary" style="border:0;cursor:pointer;">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>

<footer>
  <div class="footer-logo"><img src="samlogo.png" alt="sam"/></div>
  <div class="footer-copy">&copy; 2026 sam&reg; Products, ZetrOZ Systems LLC | Trumbull, CT | 888-202-9831</div>
  <div class="footer-links" style="display: flex; align-items: center; flex-wrap: wrap; margin-top: 12px;">
    <a href="clinical-studies.php">Clinical Studies</a>
    <a href="contact-us.php">Contact</a>
  
    <div style="width: 1px; height: 16px; background: rgba(255,255,255,0.2); margin-left: 24px;"></div>
    <a href="https://www.facebook.com/samrecover/about/" target="_blank" rel="noopener" aria-label="Facebook" style="display: flex; align-items: center;"><svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.312h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg></a>
    <a href="https://x.com/samrecover" target="_blank" rel="noopener" aria-label="X" style="display: flex; align-items: center;"><svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.004 4.076H5.036z"/></svg></a>
    <a href="https://www.linkedin.com/showcase/sam%C2%AE-recover/" target="_blank" rel="noopener" aria-label="LinkedIn" style="display: flex; align-items: center;"><svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
    <a href="https://www.instagram.com/sam.recover/" target="_blank" rel="noopener" aria-label="Instagram" style="display: flex; align-items: center;"><svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>
  </div>
</footer>
<script src="assets/site-enhancements.js?v=20260624-forms"></script>
<script src="assets/header-config.js?v=20260911-1"></script>
</body>
</html>








