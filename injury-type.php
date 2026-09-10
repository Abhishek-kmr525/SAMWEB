<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Injury Type | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<style>
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
  :root {
    --green: #c2d500;
    --green-dark: #a9bb00;
    --green-bg: #f7fae8;
    --green-pale: #e9f1a4;
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
  body { font-family: "Inter", sans-serif; color: var(--black); background: var(--white); overflow-x: hidden; }
  a { color: inherit; }

  header {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: grid; grid-template-columns: 1fr auto 1fr; align-items: center;
    padding: 24px 56px; pointer-events: none;
  }
  .header-logo { pointer-events: auto; justify-self: start; }
  .header-logo img { height: 48px; display: block; }
  .nav-pill {
    pointer-events: auto; justify-self: center;
    background: rgba(255,255,255,0.9); backdrop-filter: blur(20px);
    border: 1px solid var(--gray-300); border-radius: 100px; padding: 0 16px;
    display: flex; align-items: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  }
  .nav-links { display: flex; list-style: none; margin: 0; padding: 0; }
  .nav-links > li { position: relative; }
  .nav-links > li > a {
    color: var(--gray-700); text-decoration: none; font-size: 13px; font-weight: 700;
    padding: 16px 18px; display: block; letter-spacing: 0.05em; text-transform: uppercase;
    transition: color 0.2s;
  }
  .nav-links > li > a:hover, .nav-links > li > a.active { color: var(--green-dark); }
  .dropdown {
    position: absolute; top: 100%; left: 50%; transform: translateX(-50%) translateY(10px);
    background: rgba(255,255,255,0.95); backdrop-filter: blur(24px);
    border: 1px solid var(--gray-300); border-radius: 16px; padding: 12px 0; min-width: 220px;
    opacity: 0; visibility: hidden; transition: all 0.2s ease;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  .nav-links > li:hover > .dropdown { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0); }
  .dropdown li { position: relative; display: block; }
  .dropdown a {
    color: var(--gray-700); text-decoration: none; font-size: 14px; font-weight: 500;
    padding: 10px 24px; display: flex; align-items: center; justify-content: space-between; transition: all 0.2s;
  }
  .dropdown a:hover { color: var(--green-dark); background: var(--gray-50); }
  .sub-dropdown {
    position: absolute; top: -12px; left: 100%; transform: translateX(10px);
    background: rgba(255,255,255,0.95); backdrop-filter: blur(24px);
    border: 1px solid var(--gray-300); border-radius: 16px; padding: 12px 0; min-width: 200px;
    opacity: 0; visibility: hidden; transition: all 0.2s ease; box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  }
  .dropdown li:hover > .sub-dropdown { opacity: 1; visibility: visible; transform: translateX(4px); }

  .hero {
    min-height: 92vh; padding: 140px 56px 82px; display: grid; grid-template-columns: minmax(0, 0.95fr) minmax(420px, 1.05fr);
    gap: 64px; align-items: center; max-width: 1280px; margin: 0 auto;
  }
  .eyebrow {
    display: inline-flex; align-items: center; gap: 8px; background: var(--green-bg); border: 1px solid var(--green-pale);
    color: var(--green-dark); padding: 7px 16px; border-radius: 100px; font-size: 12px; font-weight: 800;
    letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 24px;
  }
  .hero-copy, .hero-media, .{ opacity: 0; transform: translateY(28px); }
  .hero h1 { font-size: clamp(42px, 5.2vw, 74px); font-weight: 900; line-height: 0.98; letter-spacing: -0.04em; margin-bottom: 26px; }
  .accent { color: var(--green-dark); }
  .hero p { color: var(--gray-500); font-size: 18px; line-height: 1.75; max-width: 620px; }
  .hero-actions { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 38px; }
  .btn-primary, .btn-outline, .btn-dark {
    display: inline-flex; align-items: center; justify-content: center; min-height: 48px;
    padding: 14px 28px; border-radius: 8px; font-size: 15px; font-weight: 800; text-decoration: none; transition: all 0.2s;
  }
  .btn-primary { background: var(--green); color: var(--black); box-shadow: 0 8px 24px rgba(194,213,0,0.22); }
  .btn-primary:hover { background: var(--green-dark); transform: translateY(-1px); }
  .btn-outline { background: transparent; color: var(--black); border: 2px solid var(--gray-300); }
  .btn-outline:hover { border-color: var(--green); color: var(--green-dark); }
  .btn-dark { background: var(--black); color: var(--white); }
  .btn-dark:hover { background: var(--gray-900); transform: translateY(-1px); }

  .media-frame {
    position: relative; border-radius: 28px; padding: 16px; background: var(--green); box-shadow: 0 28px 80px rgba(0,0,0,0.14);
  }
  .media-frame::before {
    content: ""; position: absolute; inset: 0; border-radius: 28px;
    background-image: radial-gradient(rgba(0,0,0,0.12) 3px, transparent 3px);
    background-size: 34px 34px;
  }
  .media-frame video, .media-frame img {
    position: relative; z-index: 1; width: 100%; height: 520px; object-fit: contain; display: block;
    border-radius: 18px; background: var(--black); box-shadow: 0 18px 44px rgba(0,0,0,0.18);
  }
  .media-chip {
    position: absolute; z-index: 2; right: -18px; bottom: 28px; max-width: 230px;
    background: var(--white); border: 1px solid var(--gray-100); border-radius: 14px;
    padding: 18px 20px; box-shadow: 0 16px 38px rgba(0,0,0,0.14);
  }
  .chip-num { color: var(--green-dark); font-size: 28px; line-height: 1; font-weight: 900; letter-spacing: -0.03em; }
  .chip-label { color: var(--gray-500); font-size: 12px; line-height: 1.45; margin-top: 5px; font-weight: 900; }

  section { padding: 96px 56px; }
  .section-inner { max-width: 1160px; margin: 0 auto; }
  .section-kicker { color: var(--green-dark); font-size: 13px; font-weight: 900; letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 12px; }
  .section-title { font-size: clamp(30px, 3.5vw, 50px); font-weight: 900; letter-spacing: -0.035em; line-height: 1.08; }
  .section-copy { color: var(--gray-500); font-size: 16px; line-height: 1.75; max-width: 720px; margin-top: 16px; }

  .proof-section { background: var(--gray-900); color: var(--white); padding: 58px 56px; }
  .proof-layout { max-width: 1160px; margin: 0 auto; display: grid; grid-template-columns: 0.9fr 1.1fr; gap: 42px; align-items: center; }
  .proof-copy h2 { font-size: clamp(28px, 3.2vw, 44px); line-height: 1.08; letter-spacing: -0.03em; margin-bottom: 14px; }
  .proof-copy p { color: rgba(255,255,255,0.68); font-size: 16px; line-height: 1.7; }
  .proof-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
  .proof-card {
    min-height: 112px; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);
    border-radius: 14px; padding: 22px; display: flex; flex-direction: column; justify-content: center;
  }
  .proof-card strong { display: block; color: var(--green); font-size: 26px; line-height: 1.05; letter-spacing: -0.03em; margin-bottom: 6px; }
  .proof-card span { display: block; color: rgba(255,255,255,0.72); font-size: 13px; line-height: 1.45; font-weight: 900; }

  .science-section { background: var(--gray-50); }
  .science-layout { display: grid; grid-template-columns: 0.85fr 1.15fr; gap: 54px; align-items: start; }
  .science-card {
    background: var(--white); border: 1px solid var(--gray-100); border-radius: 18px; overflow: hidden;
    box-shadow: 0 12px 36px rgba(0,0,0,0.05);
  }
  .science-card img { width: 100%; height: 320px; object-fit: cover; display: block; }
  .science-card .body { padding: 26px; }
  .science-card h3 { font-size: 20px; line-height: 1.2; margin-bottom: 10px; }
  .science-card p { color: var(--gray-500); line-height: 1.65; font-size: 14px; }
  .pathway-list { display: grid; gap: 16px; margin-top: 32px; }
  .pathway {
    background: var(--white); border: 1px solid var(--gray-100); border-radius: 14px; padding: 22px;
    display: grid; grid-template-columns: 52px 1fr; gap: 18px; transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
  }
  .pathway:hover { border-color: var(--green-pale); transform: translateY(-2px); box-shadow: 0 12px 36px rgba(0,0,0,0.06); }
  .pathway-num {
    width: 52px; height: 52px; border-radius: 50%; background: var(--green); color: var(--black);
    display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 18px;
  }
  .pathway h3 { font-size: 17px; margin-bottom: 6px; }
  .pathway p { color: var(--gray-500); font-size: 14px; line-height: 1.6; }

  .protocol-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 28px; margin-top: 48px; }
  .protocol-card {
    background: var(--white); border: 1px solid var(--gray-100); border-radius: 16px; overflow: hidden;
    box-shadow: 0 8px 28px rgba(0,0,0,0.05); transition: transform 0.25s, box-shadow 0.25s, border-color 0.25s;
  }
  .protocol-card:hover { transform: translateY(-5px); box-shadow: 0 18px 44px rgba(0,0,0,0.1); border-color: var(--green-pale); }
  .protocol-media { height: 300px; background: var(--gray-100); overflow: hidden; }
  .protocol-media img, .protocol-media video { width: 100%; height: 100%; object-fit: contain; display: block; }
  .protocol-body { padding: 26px; }
  .tag { display: inline-flex; background: var(--green-bg); color: var(--green-dark); border: 1px solid var(--green-pale); border-radius: 100px; padding: 5px 11px; font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 13px; }
  .protocol-body h3 { font-size: 19px; margin-bottom: 9px; line-height: 1.2; }
  .protocol-body p { color: var(--gray-500); font-size: 14px; line-height: 1.65; }

  .evidence-band { background: var(--green-bg); }
  .evidence-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 56px; align-items: center; }
  .evidence-panel {
    background: var(--white); border: 1px solid var(--green-pale); border-radius: 20px; padding: 28px;
    box-shadow: 0 14px 44px rgba(194,213,0,0.12);
  }
  .evidence-row {
    display: grid; grid-template-columns: 120px 1fr; gap: 18px; padding: 18px 0; border-bottom: 1px solid var(--gray-100);
  }
  .evidence-row:last-child { border-bottom: 0; }
  .evidence-row strong { color: var(--black); font-size: 15px; }
  .evidence-row span { color: var(--gray-500); font-size: 14px; line-height: 1.55; }

  .resource-card {
    display: grid; grid-template-columns: 220px 1fr; gap: 28px; align-items: center;
    background: var(--gray-900); color: var(--white); border-radius: 22px; padding: 28px; overflow: hidden;
  }
  .resource-card img { width: 100%; min-height: 220px; object-fit: cover; border-radius: 14px; background: var(--white); }
  .resource-card p { color: rgba(255,255,255,0.66); line-height: 1.7; margin: 12px 0 24px; }

  .cta-section { background: var(--black); color: var(--white); text-align: center; padding: 110px 56px; }
  .cta-section h2 { font-size: clamp(32px, 4vw, 56px); font-weight: 900; letter-spacing: -0.035em; margin-bottom: 18px; }
  .cta-section p { max-width: 680px; margin: 0 auto 36px; color: #94a3b8; line-height: 1.7; font-size: 18px; }
  .cta-actions { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; }
  .btn-white { background: var(--green); color: var(--black); padding: 16px 34px; border-radius: 8px; font-size: 16px; font-weight: 800; text-decoration: none; transition: all 0.2s; }
  .btn-white:hover { background: var(--green-dark); transform: translateY(-1px); }
  .btn-bordered { background: transparent; color: var(--white); border: 2px solid rgba(255,255,255,0.26); padding: 16px 34px; border-radius: 8px; font-size: 16px; font-weight: 700; text-decoration: none; transition: all 0.2s; }
  .btn-bordered:hover { border-color: var(--white); background: rgba(255,255,255,0.08); }

  footer {
    background: var(--gray-900); padding: 40px 56px; display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 16px; border-top: 1px solid rgba(255,255,255,0.08);
  }
  .footer-logo img { height: 30px; opacity: 0.7; }
  .footer-copy { color: #6b7280; font-size: 13px; }
  .footer-links a { color: #6b7280; text-decoration: none; font-size: 13px; margin-left: 24px; transition: color 0.2s; }
  .footer-links a:hover { color: var(--white); }

  @media (max-width: 1040px) {
    header { padding: 20px 24px; grid-template-columns: 1fr auto; }
    .nav-pill { justify-self: end; max-width: calc(100vw - 140px); overflow-x: auto; border-radius: 18px; }
    .nav-links > li > a { white-space: nowrap; padding: 14px 14px; }
    .hero { grid-template-columns: 1fr; padding: 120px 24px 70px; }
    .hero-media { max-width: 720px; }
    .media-frame video, .media-frame img { height: 420px; }
    section, .proof-section, .cta-section { padding-left: 24px; padding-right: 24px; }
    .proof-layout, .proof-grid, .protocol-grid, .evidence-layout, .science-layout { grid-template-columns: 1fr; }
    .resource-card { grid-template-columns: 1fr; }
  }
  @media (max-width: 720px) {
    header { position: static; display: block; padding: 18px; }
    .header-logo img { height: 38px; margin-bottom: 14px; }
    .nav-pill { width: 100%; max-width: none; justify-content: flex-start; }
    .dropdown, .sub-dropdown { display: none; }
    .hero { padding-top: 44px; }
    .hero h1 { font-size: 42px; }
    .hero p { font-size: 16px; }
    .media-frame { padding: 10px; border-radius: 20px; }
    .media-frame video, .media-frame img { height: 320px; border-radius: 14px; }
    .media-chip { position: relative; right: auto; bottom: auto; margin: 12px 0 0; max-width: none; }
    .protocol-grid { gap: 18px; }
    .evidence-row { grid-template-columns: 1fr; gap: 6px; }
    footer { flex-direction: column; align-items: flex-start; padding: 32px 24px; }
    .footer-links a { margin: 0 18px 0 0; }
  }
.injury-hero {
    min-height: 50vh; padding: 180px 56px 80px; display: flex; flex-direction: column; align-items: center; justify-content: center;
    background: var(--gray-900); color: var(--white); text-align: center; position: relative; overflow: hidden;
  }
  .injury-hero-inner { position: relative; z-index: 1; max-width: 800px; }
  .section-tag { display: inline-flex; align-items: center; background: rgba(194,213,0,0.15); border: 1px solid var(--green); color: var(--green); padding: 6px 14px; border-radius: 100px; font-size: 11px; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 20px; }
  .injury-hero h1 { font-size: clamp(42px, 5vw, 68px); font-weight: 900; line-height: 1.05; letter-spacing: -0.03em; margin-bottom: 24px; }
  .injury-hero p { font-size: 20px; color: var(--gray-300); line-height: 1.65; max-width: 650px; margin: 0 auto; }

  .cards-section { padding: 100px 56px; background: var(--gray-50); }
  .cards-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; max-width: 1280px; margin: 0 auto; }
  .injury-card {
    background: var(--white); border-radius: 24px; padding: 48px 40px; border: 1px solid var(--gray-100);
    box-shadow: 0 15px 35px rgba(0,0,0,0.03); transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex; flex-direction: column; opacity: 0; transform: translateY(30px);
  }
  .injury-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px rgba(0,0,0,0.08); border-color: var(--green-pale); }
  .card-image { width: 100%; height: 200px; object-fit: cover; border-radius: 12px; margin-bottom: 24px; display: block; }
  .injury-card h3 { font-size: 22px; font-weight: 800; margin-bottom: 16px; color: var(--black); line-height: 1.3; }
  .injury-card p { font-size: 16px; color: var(--gray-500); line-height: 1.6; margin-bottom: 32px; flex-grow: 1; }
  .card-btn {
    display: inline-flex; align-items: center; justify-content: center; padding: 14px 28px;
    background: var(--gray-100); color: var(--black); font-weight: 700; text-decoration: none; border-radius: 8px;
    transition: all 0.2s; align-self: flex-start;
  }
  .injury-card:hover .card-btn { background: var(--green); color: var(--black); }

  .banner-section {
    background: var(--green); padding: 80px 56px; text-align: center; border-radius: 32px; max-width: 1280px; margin: 0 auto 100px;
  }
  .banner-section h2 { font-size: 36px; font-weight: 900; margin-bottom: 16px; color: var(--black); }
  .banner-section p { font-size: 18px; color: var(--gray-700); margin-bottom: 32px; max-width: 600px; margin-inline: auto; }
  .btn-black { display: inline-flex; background: var(--black); color: var(--white); padding: 16px 32px; border-radius: 12px; font-weight: 800; font-size: 16px; text-decoration: none; transition: background 0.2s; }
  .btn-black:hover { background: var(--gray-900); }

  .video-section { max-width: 1000px; margin: 0 auto 100px; padding: 0 56px; text-align: center; }
  .video-section h2 { font-size: 36px; font-weight: 900; margin-bottom: 40px; }
  .video-wrapper { border-radius: 24px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.15); background: var(--black); padding-bottom: 56.25%; position: relative; }
  .video-wrapper iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; }

  @media (max-width: 900px) {
    .injury-hero { padding: 140px 24px 60px; }
    .cards-section { padding: 60px 24px; }
    .banner-section { padding: 60px 24px; margin: 0 24px 60px; border-radius: 24px; }
    .video-section { padding: 0 24px; margin-bottom: 60px; }
  }

  .hero-soft, .hero-chronic, .hero-sports {
    position: relative; width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;
    background-size: cover; background-position: center; color: var(--white); text-align: center;
    min-height: 50vh; padding: 100px 24px 60px; border-radius: 32px; max-width: 1280px; margin: 20px auto 60px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.2); overflow: hidden;
  }
  .hero-soft::before, .hero-chronic::before, .hero-sports::before {
    content: ''; position: absolute; inset: 0; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.8)); z-index: 0;
  }
  .hero-soft > *, .hero-chronic > *, .hero-sports > * { position: relative; z-index: 1; }
  
  .hero-soft { background-image: url('https://samrecover.com/wp-content/uploads/2021/01/Sam_Patient_Resources_Injury.jpg'); }
  .hero-chronic { background-image: url('https://samrecover.com/wp-content/uploads/2021/01/Sam_Soldier_Patient_2.jpg'); }
  .hero-sports { background-image: url('https://samrecover.com/wp-content/uploads/2021/01/Sam_header_1350x500_Athletes-1.jpg'); }

  .hero-soft h1, .hero-chronic h1, .hero-sports h1 { font-size: clamp(40px, 5vw, 64px); margin-bottom: 24px; font-weight: 900; letter-spacing: -0.02em; line-height: 1.1; }
  .hero-soft p.subtitle, .hero-chronic p.subtitle { font-size: 20px; font-weight: 700; color: var(--green); margin-bottom: 16px; text-transform: uppercase; letter-spacing: 1px; }
  .hero-soft p.desc, .hero-chronic p.desc, .hero-sports p { font-size: clamp(16px, 2vw, 20px); max-width: 800px; margin: 0 auto; color: var(--gray-300); line-height: 1.6; }

  .injury-tabs-nav {
    display: flex; justify-content: center; gap: 16px; max-width: 900px;
    margin: -40px auto 60px; position: relative; z-index: 10; padding: 0 24px; flex-wrap: wrap;
  }
  .tab-btn {
    background: var(--white); border: 2px solid var(--gray-100); border-radius: 100px;
    padding: 16px 36px; font-size: 15px; font-weight: 800; color: var(--gray-500);
    cursor: pointer; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-transform: uppercase; letter-spacing: 0.05em;
  }
  .tab-btn:hover { color: var(--black); transform: translateY(-2px); border-color: var(--gray-300); }
  .tab-btn.active {
    background: var(--green); border-color: var(--green); color: var(--black);
    box-shadow: 0 15px 40px rgba(194,213,0,0.3);
  }
  .tab-pane { display: none; animation: fadeIn 0.5s ease; }
  .tab-pane.active { display: block; }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* Specific sports styles */
  .stats-banner { background: var(--green); color: var(--black); padding: 80px 24px; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px; text-align: center; border-radius: 32px; max-width: 1280px; margin: 0 auto 100px; }
  .stat-item h3 { font-size: 56px; font-weight: 900; margin-bottom: 12px; letter-spacing: -2px; line-height: 1; }
  .stat-item p { font-size: 16px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
  .feature-block { display: flex; flex-wrap: wrap; align-items: center; max-width: 1200px; margin: 120px auto; padding: 0 24px; gap: 64px; }
  .feature-text { flex: 1; min-width: 320px; }
  .feature-text h2 { font-size: 48px; font-weight: 900; margin-bottom: 24px; line-height: 1.1; letter-spacing: -0.03em; }
  .feature-text p { font-size: 18px; line-height: 1.8; color: var(--gray-500); margin-bottom: 24px; }
  .feature-image { flex: 1; min-width: 320px; }
  .feature-image img { width: 100%; border-radius: 32px; box-shadow: 0 32px 80px rgba(0,0,0,0.15); }
  .dark-cards { background: var(--black); padding: 120px 56px; color: var(--white); border-radius: 32px; max-width: 1280px; margin: 0 auto 100px;}
  .dark-cards .section-title { color: var(--white); text-align: center; margin-bottom: 80px; }
  .cards-wrapper { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; }
  .dark-card { background: var(--gray-900); padding: 56px 48px; border-radius: 24px; border-top: 6px solid var(--green); transition: transform 0.3s; }
  .dark-card:hover { transform: translateY(-10px); }
  .dark-card h3 { color: var(--green); font-size: 32px; margin-bottom: 24px; font-weight: 800; }
  .dark-card p { color: var(--gray-300); line-height: 1.7; font-size: 16px; margin-bottom: 32px; }
  .dark-card .kicker { font-size: 15px; font-weight: 800; color: var(--white); text-transform: uppercase; letter-spacing: 1px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 24px; }
  .video-banner { max-width: 1000px; margin: 120px auto; padding: 0 24px; text-align: center; }
</style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
  <?php include __DIR__ . '/includes/google-tag.php'; ?>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>



<main>
  <section class="injury-hero">
    <div class="injury-hero-inner">
      <div class="section-tag">Treatment Pathways</div>
      <h1>Injury Types &amp; Coverage</h1>
      <p>Covered by most insurance benefits. Choose the right contact to get treatment now and accelerate your path to recovery.</p>
    </div>
  </section>

  <div class="injury-tabs-nav">
    <button class="tab-btn active" onclick="openTab(this, 'soft-tissue')">Soft Tissue Injury</button>
    <button class="tab-btn" onclick="openTab(this, 'chronic-pain')">Chronic Pain</button>
    <button class="tab-btn" onclick="openTab(this, 'sports-injury')">Sports Injury</button>
  </div>

  <div id="soft-tissue" class="tab-pane active">
    
      <section class="hero-soft">
      <div style="text-transform: uppercase; letter-spacing: 3px; font-weight: 800; color: var(--green); margin-bottom: 16px;">Patient Resources</div>
      <h1>Soft Tissue Injury</h1>
      <p class="subtitle">Tendon, Ligaments and Muscle Tissue Healed.</p>
      <p class="desc">Clinically PROVEN. sam&reg; is not a pain masking treatment like drugs and electromagnetic devices. sam&reg; uses multi-hour ultrasound to accelerate biological repair processes. sam&reg; ultrasound treatment is covered by health insurance to treat injuries without surgery or injections.</p>
      <a href="contact-us.php" class="btn-primary" style="margin-top: 40px; padding: 18px 36px; font-size: 18px;">Get Help With Your Injury</a>
    </section>

  <section class="science-section">
    <div class="section-inner">
      <h2 class="section-title" style="text-align: center; margin-bottom: 64px;">Soft Tissue Injuries Can Take Months to Heal.<br><span class="accent">Let sam&reg; accelerate this process for you!</span></h2>
      <div class="protocol-grid" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
        <div class="protocol-card">
          <div class="protocol-body">
            <div class="tag">Tendon &amp; Ligament</div>
            <h3>Tendon &amp; Ligament Injuries</h3>
            <p>Tendon and ligament injuries are slow to heal since the collagen matrix does not remodel quickly, and there is limited blood and nutrient supply to these tissues. sam&reg; increases cellular remodeling, circulation and reduces inflammation.</p>
            <ul style="margin-top: 16px; padding-left: 20px; color: var(--gray-500); font-size: 14px; line-height: 1.65;">
              <li>Tendonitis</li>
              <li>Rotator Cuff Injury</li>
              <li>Runners Knee</li>
              <li>ACL/MCL Reconstruction</li>
            </ul>
          </div>
        </div>
        
        <div class="protocol-card">
          <div class="protocol-body">
            <div class="tag">Joints</div>
            <h3>Joint Injuries</h3>
            <p>The most challenging part of the body is the joint. The joint is subject high loading and pressures to support the kinematics of the body, and becomes more prone to injury as we age. Injury to the cartilage and connective tissues can take months-to-years to respond to traditional treatment. sam&reg; multi-hour ultrasound applied daily is able to increase circulation and nutrient transfer into the joint space. It is a recommended conservative treatment option prior to surgical intervention.</p>
            <ul style="margin-top: 16px; padding-left: 20px; color: var(--gray-500); font-size: 14px; line-height: 1.65;">
              <li>Meniscus</li>
              <li>Patella-Femoral Injuries</li>
              <li>Arthritis</li>
              <li>Inflammatory Trauma</li>
            </ul>
          </div>
        </div>

        <div class="protocol-card">
          <div class="protocol-body">
            <div class="tag">Muscles</div>
            <h3>Muscle Injuries</h3>
            <p>Muscle injuries include strains and tears, and can impact multiple parts of the body. Some of the most common injuries treated with sam&reg; include muscle-related back, neck and shoulder pain. Most muscle injuries will respond to sam&reg; within the first week of treatment.</p>
            <ul style="margin-top: 16px; padding-left: 20px; color: var(--gray-500); font-size: 14px; line-height: 1.65;">
              <li>Neck-Pain</li>
              <li>Back Strain</li>
              <li>Whiplash Injury</li>
              <li>Hamstring/Quad Tear</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  </div>

  <div id="chronic-pain" class="tab-pane">
    
      <section class="hero-chronic">
      <div style="text-transform: uppercase; letter-spacing: 3px; font-weight: 800; color: var(--green); margin-bottom: 16px;">Patient Resources</div>
      <h1>Chronic Pain</h1>
      <p class="subtitle">Ultrasound for Chronic Joint and Back Pain</p>
      <p class="desc">Arthritis and Back pain are debilitating and can stop you from enjoying everyday life, even your sleep. Our daily wearable ultrasound treatment provided by sam&reg; is clinically proven for reducing pain and FDA cleared for treating pain. The safe, non-invasive treatment is available for veterans and military soldiers by prescription.</p>
      <div style="margin-top: 32px; display: flex; flex-wrap: wrap; justify-content: center; gap: 16px; max-width: 800px;">
        <span style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 100px; font-size: 14px; font-weight: 900;">Arthritis and Joint Pain</span>
        <span style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 100px; font-size: 14px; font-weight: 900;">Back and Muscle Pain</span>
        <span style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 100px; font-size: 14px; font-weight: 900;">Post-Operative Recovery</span>
        <span style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 100px; font-size: 14px; font-weight: 900;">Tendinitis</span>
      </div>
      <a href="contact-us.php" class="btn-primary" style="margin-top: 40px; padding: 18px 36px; font-size: 18px;">Get sam&reg; Now!</a>
    </section>

  <section class="proof-section">
    <div class="proof-layout">
      <div class="proof-copy">
        <div class="section-kicker">Veteran Patient Story</div>
        <h2>Hear the story of a Veteran Patient</h2>
        <p>Dennis is a military Veteran dealing with chronic pain. Dennis got treatment from his local VA in North Carolina and has now referred other veterans to sam&reg;.</p>
        <div style="margin-top: 32px;">
          <a href="testimonials.php" class="btn-outline" style="color: white; border-color: rgba(255,255,255,0.3);">View More Military Testimonials</a>
        </div>
      </div>
      <div class="media-frame" style="background: transparent; box-shadow: none; padding: 0;">
        <div class="video-wrapper">
          <iframe src="https://www.youtube.com/embed/0qIj7NguhHM?autoplay=1&loop=1&playlist=0qIj7NguhHM&mute=1&controls=0&cc_load_policy=0&iv_load_policy=3" title="sam&reg; Sport US Veteran Dennis Scott Testimonial" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>

  <section class="science-section">
    <div class="section-inner">
      <h2 class="section-title" style="text-align: center; margin-bottom: 64px;">Meet patients using sam&reg; for <span class="accent">chronic pain</span></h2>
      <div class="protocol-grid" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
        
        <div class="protocol-card">
          <div class="protocol-media" style="aspect-ratio: auto; height: auto; border-bottom: none; padding-top: 28px; text-align: center;">
            <img src="https://samrecover.com/wp-content/uploads/2021/01/Sam_rodge2.jpg" style="object-fit: cover; width: 80%; aspect-ratio: 1 / 1; border-radius: 16px; display: inline-block; box-shadow: 0 12px 30px rgba(0,0,0,0.1);" alt="Rodger Amendesk" />
          </div>
          <div class="protocol-body">
            <div class="tag">Connecticut USA</div>
            <h3>Rodger Amendesk</h3>
            <p>Roger is a pilot, grandfather and aviation instructor. He has battled arthritis in his knees for over a decade limiting his ability to fly, play and live life. Roger swears by sam&reg; and knows that injections and surgery are a thing of the past for him. Roger got his sam&reg; from the CT-VA.</p>
          </div>
        </div>
        
        <div class="protocol-card">
          <div class="protocol-media" style="aspect-ratio: auto; height: auto; border-bottom: none; padding-top: 28px; text-align: center;">
            <img src="https://samrecover.com/wp-content/uploads/2021/01/Sam_Glenn-Yawn-300x300.jpg" style="object-fit: cover; width: 80%; aspect-ratio: 1 / 1; border-radius: 16px; display: inline-block; box-shadow: 0 12px 30px rgba(0,0,0,0.1);" alt="Glenn Yawn" />
          </div>
          <div class="protocol-body">
            <div class="tag">International Base</div>
            <h3>Glenn Yawn</h3>
            <p>Mr. Yawn is an active duty soldier stationed outside of the USA. He suffered from chronic shoulder pain that was so severe that even pain-pills could not help him sleep at night. Mr. Yawn got sam&reg; right at his military base and treated daily to heal his injury.</p>
          </div>
        </div>

        <div class="protocol-card">
          <div class="protocol-media" style="aspect-ratio: auto; height: auto; border-bottom: none; padding-top: 28px; text-align: center;">
            <img src="https://samrecover.com/wp-content/uploads/2021/01/Sam_Jenn_Rickly-300x300.jpeg" style="object-fit: cover; width: 80%; aspect-ratio: 1 / 1; border-radius: 16px; display: inline-block; box-shadow: 0 12px 30px rgba(0,0,0,0.1);" alt="Jenn Rickly" />
          </div>
          <div class="protocol-body">
            <div class="tag">North Carolina USA</div>
            <h3>Jenn Rickly</h3>
            <p>Mrs. Rickly has experienced degenerative disc pain in her lower back since traumatic injury during service. She has utilized narcotics, physical therapy, massage treatment and electrical devices in the past with little to no benefit. sam&reg; was prescribed from her NC-VA before surgery as the last option, and she is now able to manage her pain for the first time in 3 years.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  </div>

  <div id="sports-injury" class="tab-pane">
    
  <section class="hero-sports">
    <div style="text-transform: uppercase; letter-spacing: 3px; font-weight: 800; color: var(--green); margin-bottom: 16px;">Sports Injury</div>
    <h1>The #1 Prescribed Ultrasound Device<br>in Professional Sports.</h1>
    <p>sam&reg; is a prescription device covered by most professional sports and collegiate insurance companies, delivering proven relief for athletes.</p>
    <a href="contact-us.php" class="btn-primary" style="margin-top: 40px; padding: 18px 36px; font-size: 18px;">Learn About Insurance Options</a>
  </section>

  <section class="stats-banner">
    <div class="stat-item">
      <h3>50%</h3>
      <p>Of Injured Athletes Get sam&reg; as Standard Care</p>
    </div>
    <div class="stat-item">
      <h3>90%</h3>
      <p>Utilized by PRO Sports Medical Physicians</p>
    </div>
    <div class="stat-item">
      <h3>18,720</h3>
      <p>Joules of Energy Per Treatment</p>
    </div>
  </section>

  <section class="feature-block">
    <div class="feature-text">
      <h2>Treating Injured Sites Throughout The Body</h2>
      <p>The elbow, Achilles, patella, shoulder and bicep tendons, as well as trapezius, hamstring, and quadriceps muscles can all be treated with sam&reg;.</p>
      <p>Indicated for the treatment of select medical conditions such as the relief of pain, the relief of muscle spasm, the treatment of joint contractures, and the increase of local circulation. 40-60% of athletic injuries are sam&reg; treatable. Noninvasive, PROVEN and easy.</p>
    </div>
    <div class="feature-image">
      <img src="https://samrecover.com/wp-content/uploads/2021/01/Sam_placement-768x512.jpg" alt="Runner highlighting injury locations treated by sam" />
    </div>
  </section>

  <section class="video-banner">
    <h2>sam&reg; Mechanisms of Action</h2>
    <div class="video-wrapper">
      <iframe src="https://www.youtube.com/embed/BFtlG1qS7nQ?autoplay=1&loop=1&playlist=BFtlG1qS7nQ&mute=1&controls=0&cc_load_policy=0&iv_load_policy=3" title="Sustained Acoustic Medicine Mechanisms of Action" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </section>

  <section class="dark-cards">
    <h2 class="section-title">The New Normal In Sports Medicine</h2>
    <div class="cards-wrapper">
      <div class="dark-card">
        <h3>NCAA Athletes</h3>
        <p>The sam&reg; college-cap program has you covered. All major insurance and secondary providers work with us.</p>
        <div class="kicker">Authorized in 2-3 days</div>
      </div>
      <div class="dark-card">
        <h3>PRO Athletes</h3>
        <p>Approved in 2016, we support athletes, teams and the medical staff to deliver sam&reg; 24 hours per day.</p>
        <div class="kicker">Pre-Approved. Healed. Done.</div>
      </div>
      <div class="dark-card">
        <h3>There is only one sam&reg;</h3>
        <p>There are many joint injections, biologics, electrical/magnetic stims, and ultrasound devices to choose from. sam&reg; has disrupted the medical industry in a good way.</p>
        <div style="margin-top: 32px;">
          <a href="sam-tech.php" class="btn-primary" style="padding: 12px 24px; font-size: 14px;">Product Comparison Table</a>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-banner">
    <h2>Join us in treating 100 Million Patients<br>Without Surgery and Drugs.</h2>
    <div style="margin-top: 48px;">
      <a href="contact-us.php" class="btn-primary" style="padding: 18px 40px; font-size: 20px;">Get sam&reg; Today!</a>
    </div>
  </section>

  </div>

  <section class="cta-section">
    <h2>Are you in need of help?</h2>
    <p>Don't hesitate to contact sam&reg; customer support. We have helped many people in the same situations as you're probably in. We have a network across the United States Healthcare System to provide timely assistance for all patients.</p>
    <div style="color: var(--white); font-size: 18px; margin-bottom: 32px; font-weight: 900;">
      Email: <a href="mailto:info@samrecover.com" style="color: var(--green);">info@samrecover.com</a> &nbsp;|&nbsp; Phone: <a href="tel:8882029831" style="color: var(--green);">(888) 202-9831</a>
    </div>
    <div class="cta-actions">
      <a href="contact-us.php" class="btn-white">Injured? We can Help!</a>
    </div>
  </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>



<script>
  gsap.registerPlugin(ScrollTrigger);
  document.querySelectorAll(".reveal").forEach((el, index) => {
    gsap.to(el, {
      opacity: 1, y: 0, duration: 0.65, delay: Math.min(index * 0.05, 0.2), ease: "power3.out",
      scrollTrigger: { trigger: el, start: "top 85%" }
    });
  });

  function openTab(btn, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-pane");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
      tabcontent[i].classList.remove("active");
    }
    tablinks = document.getElementsByClassName("tab-btn");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].classList.remove("active");
    }
    document.getElementById(tabName).style.display = "block";
    document.getElementById(tabName).classList.add("active");
    btn.classList.add("active");
    if(typeof ScrollTrigger !== 'undefined') ScrollTrigger.refresh();
  }
</script>
<script src="assets/header-config.js?v=20260911-1"></script>
</body>
</html>













