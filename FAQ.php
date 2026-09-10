<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>FAQ | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
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
  .hero-copy, .hero-media, .reveal { opacity: 0; transform: translateY(28px); }
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
  .btn-dark { background: var(--gray-100); color: var(--black); }
  .btn-dark:hover { background: var(--white); box-shadow: 0 12px 32px rgba(0,0,0,0.05); transform: translateY(-1px); }

  .media-frame {
    position: relative; border-radius: 28px; padding: 16px; background: var(--green); box-shadow: 0 28px 80px rgba(0,0,0,0.14);
  }
  .media-frame::before {
    content: ""; position: absolute; inset: 0; border-radius: 28px;
    background-image: radial-gradient(rgba(0,0,0,0.12) 3px, transparent 3px);
    background-size: 34px 34px;
  }
  .media-frame video, .media-frame img {
    position: relative; z-index: 1; width: 100%; height: auto; display: block;
    border-radius: 18px; background: var(--gray-100); box-shadow: 0 18px 44px rgba(0,0,0,0.18);
  }
  .media-chip {
    position: absolute; z-index: 2; right: -18px; bottom: 28px; max-width: 230px;
    background: var(--white); border: 1px solid var(--gray-100); border-radius: 14px;
    padding: 18px 20px; box-shadow: 0 16px 38px rgba(0,0,0,0.14);
  }
  .chip-num { color: var(--green-dark); font-size: 28px; line-height: 1; font-weight: 900; letter-spacing: -0.03em; }
  .chip-label { color: var(--gray-500); font-size: 12px; line-height: 1.45; margin-top: 5px; font-weight: 600; }

  section { padding: 96px 56px; }
  .section-inner { max-width: 1160px; margin: 0 auto; }
  .section-kicker { color: var(--green-dark); font-size: 13px; font-weight: 900; letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 12px; }
  .section-title { font-size: clamp(30px, 3.5vw, 50px); font-weight: 900; letter-spacing: -0.035em; line-height: 1.08; }
  .section-copy { color: var(--gray-500); font-size: 16px; line-height: 1.75; max-width: 720px; margin-top: 16px; }

  .proof-section { background: var(--white); box-shadow: 0 12px 32px rgba(0,0,0,0.05); color: var(--black); padding: 58px 56px; }
  .proof-layout { max-width: 1160px; margin: 0 auto; display: grid; grid-template-columns: 0.9fr 1.1fr; gap: 42px; align-items: center; }
  .proof-copy h2 { font-size: clamp(28px, 3.2vw, 44px); line-height: 1.08; letter-spacing: -0.03em; margin-bottom: 14px; }
  .proof-copy p { color: rgba(255,255,255,0.68); font-size: 16px; line-height: 1.7; }
  .proof-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
  .proof-card {
    min-height: 112px; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);
    border-radius: 14px; padding: 22px; display: flex; flex-direction: column; justify-content: center;
  }
  .proof-card strong { display: block; color: var(--green); font-size: 26px; line-height: 1.05; letter-spacing: -0.03em; margin-bottom: 6px; }
  .proof-card span { display: block; color: rgba(255,255,255,0.72); font-size: 13px; line-height: 1.45; font-weight: 600; }

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
    background: var(--white); box-shadow: 0 12px 32px rgba(0,0,0,0.05); color: var(--black); border-radius: 22px; padding: 28px; overflow: hidden;
  }
  .resource-card img { width: 100%; min-height: 220px; object-fit: cover; border-radius: 14px; background: var(--white); }
  .resource-card p { color: rgba(255,255,255,0.66); line-height: 1.7; margin: 12px 0 24px; }

  .cta-section { background: var(--gray-100); color: var(--black); text-align: center; padding: 110px 56px; }
  .cta-section h2 { font-size: clamp(32px, 4vw, 56px); font-weight: 900; letter-spacing: -0.035em; margin-bottom: 18px; }
  .cta-section p { max-width: 680px; margin: 0 auto 36px; color: #94a3b8; line-height: 1.7; font-size: 18px; }
  .cta-actions { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; }
  .btn-white { background: var(--green); color: var(--black); padding: 16px 34px; border-radius: 8px; font-size: 16px; font-weight: 800; text-decoration: none; transition: all 0.2s; }
  .btn-white:hover { background: var(--green-dark); transform: translateY(-1px); }
  .btn-bordered { background: transparent; color: var(--black); border: 2px solid rgba(255,255,255,0.26); padding: 16px 34px; border-radius: 8px; font-size: 16px; font-weight: 700; text-decoration: none; transition: all 0.2s; }
  .btn-bordered:hover { border-color: var(--black); background: rgba(255,255,255,0.08); }

  footer {
    background: var(--white); box-shadow: 0 12px 32px rgba(0,0,0,0.05); padding: 40px 56px; display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 16px; border-top: 1px solid rgba(255,255,255,0.08);
  }
  .footer-logo img { height: 30px; opacity: 0.7; }
  .footer-copy { color: #6b7280; font-size: 13px; }
  .footer-links a { color: #6b7280; text-decoration: none; font-size: 13px; margin-left: 24px; transition: color 0.2s; }
  .footer-links a:hover { color: var(--black); }

  @media (max-width: 1040px) {
    header { padding: 20px 24px; grid-template-columns: 1fr auto; }
    .nav-pill { justify-self: end; max-width: calc(100vw - 140px); overflow-x: auto; border-radius: 18px; }
    .nav-links > li > a { white-space: nowrap; padding: 14px 14px; }
    .hero { grid-template-columns: 1fr; padding: 120px 24px 70px; }
    .hero-media { max-width: 720px; }
    .media-frame video, .media-frame img { height: auto; }
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
    .media-frame video, .media-frame img { height: auto; border-radius: 14px; }
    .media-chip { position: relative; right: auto; bottom: auto; margin: 12px 0 0; max-width: none; }
    .protocol-grid { gap: 18px; }
    .evidence-row { grid-template-columns: 1fr; gap: 6px; }
    footer { flex-direction: column; align-items: flex-start; padding: 32px 24px; }
    .footer-links a { margin: 0 18px 0 0; }
  }

  .faces-hero {
    min-height: 90vh; padding: 160px 56px 120px; display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center;
    background: #050505; color: var(--black); position: relative; overflow: hidden;
  }
  .faces-hero::before {
    content: ''; position: absolute; top: -20%; right: -10%; width: 60%; height: 60%;
    background: radial-gradient(circle, rgba(194,213,0,0.15) 0%, transparent 60%); z-index: 0; filter: blur(60px);
  }
  .faces-hero img.hero-bg {
    position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.15; z-index: 0; mix-blend-mode: luminosity;
  }
  .faces-hero-inner { position: relative; z-index: 1; max-width: 600px; justify-self: end; }
  .faces-hero-media { position: relative; z-index: 1; width: 100%; max-width: 600px; justify-self: start; perspective: 1000px; }
  .video-wrapper {
    position: relative; border-radius: 24px; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,255,255,0.1);
    transform: rotateY(-5deg) rotateX(5deg); transition: transform 0.5s ease;
  }
  .video-wrapper:hover { transform: rotateY(0deg) rotateX(0deg); }
  .video-wrapper iframe { display: block; width: 100%; height: 400px; }
  .section-tag { display: inline-flex; align-items: center; background: rgba(194,213,0,0.15); border: 1px solid var(--green); color: var(--green); padding: 6px 14px; border-radius: 100px; font-size: 11px; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 20px; }
  .faces-hero h1 { font-size: clamp(38px, 4.5vw, 64px); font-weight: 900; line-height: 1.05; letter-spacing: -0.03em; margin-bottom: 24px; }
  .faces-hero p { font-size: 18px; color: var(--gray-300); line-height: 1.65; margin-bottom: 30px; }

  .ambassadors-section { padding: 120px 56px; background: var(--gray-50); position: relative; }
  .ambassadors-header { text-align: center; max-width: 700px; margin: 0 auto 64px; }
  .ambassadors-header h2 { font-size: clamp(32px, 4vw, 48px); font-weight: 900; letter-spacing: -0.03em; margin-bottom: 16px; }
  .ambassadors-header p { color: var(--gray-500); font-size: 18px; line-height: 1.6; }
  .ambassadors-grid {
    display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 32px;
    max-width: 1300px; margin: 0 auto;
  }
  .ambassador-card {
    background: var(--gray-100); border-radius: 20px; overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.06); transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative; cursor: pointer; height: 380px; border: none;
    opacity: 0; transform: translateY(28px);
  }
  .ambassador-card::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 75%;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 60%, transparent 100%);
    pointer-events: none; z-index: 1; transition: height 0.4s ease;
  }
  .ambassador-card::before {
    content: ''; position: absolute; inset: 0; border-radius: 20px;
    box-shadow: inset 0 0 0 3px var(--green); opacity: 0; transition: opacity 0.4s ease; pointer-events: none; z-index: 3;
  }
  .ambassador-card:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 24px 48px rgba(0,0,0,0.15); z-index: 10; }
  .ambassador-card:hover::before { opacity: 1; }
  .ambassador-card:hover::after { height: 95%; }
  
  .ambassador-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1); position: absolute; inset: 0; z-index: 0; }
  .ambassador-card:hover img { transform: scale(1.08); }
  
  .a-card-body { position: absolute; bottom: 0; left: 0; right: 0; padding: 26px; z-index: 2; color: var(--black); display: flex; flex-direction: column; justify-content: flex-end; height: 100%; }
  .a-card-body h3 { font-size: 22px; font-weight: 800; margin-bottom: 6px; text-shadow: 0 2px 4px rgba(0,0,0,0.5); transform: translateY(20px); transition: transform 0.4s ease; }
  .a-card-body p { font-size: 14px; color: rgba(255,255,255,0.9); line-height: 1.6; text-shadow: 0 1px 2px rgba(0,0,0,0.5); opacity: 0; transform: translateY(20px); transition: all 0.4s ease; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; }
  .a-card-body p::before { content: ''; display: block; width: 30px; height: 2px; background: var(--green); margin-bottom: 12px; margin-top: 12px; opacity: 0; transition: opacity 0.4s ease; }
  
  .ambassador-card:hover .a-card-body h3 { transform: translateY(0); color: var(--green); }
  .ambassador-card:hover .a-card-body p { opacity: 1; transform: translateY(0); }
  .ambassador-card:hover .a-card-body p::before { opacity: 1; }

  .form-section { background: var(--gray-100); padding: 120px 56px; color: var(--black); position: relative; overflow: hidden; }
  .form-section::before {
    content: ''; position: absolute; bottom: -20%; left: -10%; width: 50%; height: 50%;
    background: radial-gradient(circle, rgba(194,213,0,0.15) 0%, transparent 60%); z-index: 0; filter: blur(60px);
  }
  .form-layout { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; position: relative; z-index: 1; }
  .form-copy h2 { font-size: clamp(38px, 4vw, 54px); font-weight: 900; letter-spacing: -0.03em; margin-bottom: 24px; line-height: 1.1; }
  .form-copy p { color: var(--gray-300); font-size: 18px; line-height: 1.7; margin-bottom: 42px; }
  .form-benefits { display: grid; gap: 24px; }
  .form-benefit { display: flex; align-items: center; gap: 18px; }
  .form-benefit-icon { width: 52px; height: 52px; border-radius: 50%; background: rgba(194,213,0,0.1); color: var(--green); display: flex; align-items: center; justify-content: center; font-size: 24px; border: 1px solid rgba(194,213,0,0.2); }
  .form-benefit-text { font-size: 17px; font-weight: 600; }
  
  .form-container { 
    background: rgba(255,255,255,0.03); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1); 
    border-radius: 28px; padding: 48px; box-shadow: 0 30px 60px rgba(0,0,0,0.3); 
  }
  .form-group { margin-bottom: 20px; }
  .form-group label { display: block; font-size: 13px; font-weight: 700; color: rgba(255,255,255,0.7); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.05em; }
  .form-group input, .form-group textarea { 
    width: 100%; padding: 14px 16px; border-radius: 12px; font-family: "Inter", sans-serif; font-size: 15px; transition: all 0.2s; box-sizing: border-box;
    background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: var(--black); 
  }
  .form-group input:focus, .form-group textarea:focus { outline: none; border-color: var(--green); background: rgba(0,0,0,0.5); box-shadow: 0 0 0 3px rgba(194,213,0,0.1); }
  .btn-submit { width: 100%; padding: 18px; border-radius: 12px; font-size: 16px; font-weight: 800; cursor: pointer; transition: all 0.2s; margin-top: 10px; border: none;
    background: var(--green); color: var(--black); box-shadow: 0 10px 20px rgba(194,213,0,0.2); }
  .btn-submit:hover { background: var(--green-dark); box-shadow: 0 15px 30px rgba(194,213,0,0.3); transform: translateY(-2px); }

  @media (max-width: 900px) {
    .faces-hero { grid-template-columns: 1fr; text-align: center; padding: 140px 24px 80px; gap: 40px; }
    .faces-hero-inner, .faces-hero-media { justify-self: center; }
    .video-wrapper { transform: none; }
    .video-wrapper:hover { transform: none; }
    .ambassadors-section { padding: 80px 24px; }
    .form-section { padding: 80px 24px; }
    .form-layout { grid-template-columns: 1fr; gap: 50px; }
    .form-container { padding: 32px 24px; }
  }
</style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<style>
  .faq-page {
    background: var(--gray-100);
    color: var(--black);
    min-height: 100vh;
    padding: 180px 24px 120px;
    font-family: inherit;
  }
  .faq-container {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    gap: 80px;
    align-items: flex-start;
  }
  .faq-sidebar {
    flex: 1;
    min-width: 320px;
    position: sticky;
    top: 140px;
  }
  .faq-sidebar h1 {
    font-size: clamp(48px, 6vw, 72px);
    font-weight: 900;
    margin-bottom: 24px;
    letter-spacing: -0.02em;
    line-height: 1.1;
  }
  .faq-sidebar h1 span {
    color: var(--green);
  }
  .faq-sidebar p {
    font-size: 18px;
    color: var(--gray-600);
    line-height: 1.6;
    margin-bottom: 40px;
  }
  .faq-contact-card {
    background: var(--white); box-shadow: 0 12px 32px rgba(0,0,0,0.05);
    padding: 32px;
    border-radius: 20px;
    border-left: 4px solid var(--green);
  }
  .faq-contact-card h3 {
    font-size: 20px;
    font-weight: 800;
    margin-bottom: 12px;
  }
  .faq-contact-card p {
    font-size: 15px;
    margin-bottom: 24px;
  }
  
  .faq-list {
    flex: 2;
    min-width: 320px;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  
  .faq-item {
    background: var(--white);
    border: 1px solid var(--gray-200); box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
  }
  
  .faq-item.active {
    background: var(--white);
    border-color: var(--green);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
  }

  .faq-question {
    width: 100%;
    text-align: left;
    background: none;
    border: none;
    padding: 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    color: var(--black);
    font-family: inherit;
    font-size: 20px;
    font-weight: 800;
    transition: color 0.3s ease;
  }

  .faq-question:hover {
    color: var(--green);
  }

  .faq-item.active .faq-question {
    color: var(--green);
  }

  .faq-num {
    color: var(--gray-300);
    font-size: 24px;
    font-weight: 900;
    margin-right: 24px;
    font-family: monospace;
    transition: color 0.3s ease;
  }
  
  .faq-item.active .faq-num {
    color: var(--green);
  }

  .faq-text {
    flex: 1;
    line-height: 1.4;
  }

  .faq-icon {
    width: 24px;
    height: 24px;
    position: relative;
    margin-left: 24px;
    flex-shrink: 0;
  }

  .faq-icon::before, .faq-icon::after {
    content: '';
    position: absolute;
    background: currentColor;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  }
  
  .faq-icon::before { width: 100%; height: 2px; }
  .faq-icon::after { width: 2px; height: 100%; }

  .faq-item.active .faq-icon::after {
    transform: translate(-50%, -50%) rotate(90deg);
  }

  .faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s cubic-bezier(0.16, 1, 0.3, 1);
  }

  .faq-answer-inner {
    padding: 0 32px 32px 80px;
    color: var(--gray-600);
    line-height: 1.7;
    font-size: 16px;
  }
  
  @media (max-width: 768px) {
    .faq-sidebar { position: relative; top: 0; }
    .faq-answer-inner { padding: 0 24px 24px 24px; }
    .faq-question { padding: 24px; font-size: 18px; }
    .faq-num { font-size: 18px; margin-right: 16px; }
  }
</style>

<main class="faq-page">
  <div class="faq-container">
    
    <div class="faq-sidebar reveal">
      <h1>Got Questions?<br><span>We've Got Answers.</span></h1>
      <p>Everything you need to know about Sustained Acoustic Medicine (sam&reg;), from device operation and maintenance to therapeutic benefits and pain management.</p>
      
      <div class="faq-contact-card">
        <h3>Still have a question?</h3>
        <p>If you cannot find the answer you are looking for, please don't hesitate to reach out to our team.</p>
        <a href="contact-us.php" class="btn-primary" style="padding: 14px 24px; font-size: 14px; width: 100%; text-align: center; display: inline-block;">Contact Support</a>
      </div>
    </div>

    <div class="faq-list reveal" style="transition-delay: 0.2s;">
      
      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">01</span>
          <span class="faq-text">Should I charge my sam&reg; device fully prior to use?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Yes. You should charge your sam&reg; device using only the charging cable provided with your unit. Using (or attempting to use) a charging cable that is not included with your SAM device could damage the charging port.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">02</span>
          <span class="faq-text">How do I begin using the sam&reg; device?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            <b>sam&reg; 2.0:</b> After powering the device completely, attach the applicator head to power controller cable at 45&deg; angle. Turn clockwise until surfaces are aligned. Remove the top seal of patch. Snap applicator into patch. (Be careful not to press on the bottom foil). Remove bottom foil and remove paper backing from patch. Place patch on treatment site. Press the center button for 1 second to turn the power controller on. The On light will illuminate. Press timer button to set treatment time (1-4 hours).<br><br>
            <b>sam&reg; X1:</b> When the device has been fully charged (prior to use), the LED will turn green. Gently attach the applicator. Remove the top seal of patch. Snap applicator into patch. (Be careful not to press on the bottom foil). Remove bottom foil and remove paper backing from patch. Place patch on treatment site. Press the center button for 1 second to turn the power controller on.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">03</span>
          <span class="faq-text">Does the treatment hurt?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            sam&reg; therapy is considered non-invasive and painless. The ultrasound waves used in sam&reg; treatment are typically gentle and do not cause discomfort. Patients usually report feeling a gentle vibration or warmth during the therapy, but it is generally well-tolerated.<br><br>The gentle vibration you may feel is a self-regulating feature that ensures that the tissue does not become overheated.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">04</span>
          <span class="faq-text">How does sam&reg; work?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Sustained Acoustic Medicine (sam&reg;) is a long duration, daily ultrasound treatment that can reduce the need for pain medication and surgery. Using mechanobiological technology, sam&reg; increases blood vessel diameters to improve blood flow. This increases oxygenated hemoglobin at the site and removes cytokine enzymes and cellular waste. The result is more rapid healing and reduced pain.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">05</span>
          <span class="faq-text">How is it different from other devices? (TENS)</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            <b>sam&reg;:</b> sam&reg; therapy uses high-frequency sound waves to stimulate tissue healing and reduce pain. The sound waves penetrate the skin and interact with soft tissue in the targeted anatomical region. The result is increased blood flow (oxygenation) to the region, increased cellular activity, accelerated tissue repair, and pain relief.<br><br>
            <b>TENS:</b> TENS therapy involves the use of electrical stimulation to alleviate pain. Small electrode pads are placed on the skin near the painful area, and low-voltage electrical currents are delivered, which may block or disrupt pain signals to provide relief.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">06</span>
          <span class="faq-text">How long do I have to use the device?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            We suggest an 8-week treatment plan with 4 hours of treatment a day. Some patients use the device on an ongoing basis to address lingering or chronic conditions from a prior injury or chronic condition.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">07</span>
          <span class="faq-text">How do I clean the device?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Wipe off the device and the applicators using a dry paper towel. Thoroughly clean all external surfaces using either a soft cloth dampened with cleaner or a moistened wipe for at least 30 seconds.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">08</span>
          <span class="faq-text">Can I sleep with my sam&reg; device "on"?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            It's okay to sleep with the device on but avoid sleeping directly on the device as it may damage the device and cause soreness.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">09</span>
          <span class="faq-text">What is the "buzz" sensation that I sometimes feel?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            The buzzing sensation you feel when the device is on is the device-s mechanism for cooling down and self-regulating the heat to maintain the heat in the targeted anatomical region within the desired threshold.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">10</span>
          <span class="faq-text">Can I use my patches more than once?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            No, you cannot. They are designed for single-use only to ensure maximum effectiveness and hygiene.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">11</span>
          <span class="faq-text">How can I get additional patches?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            You can buy them directly from our website at <a href="https://samsport.com/collections/all" style="color: var(--green); text-decoration: underline;">samsport.com</a>
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">12</span>
          <span class="faq-text">Can I use sam&reg; while also taking medication?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Yes. You can continue taking your medication even while using this device. The device and medication can be used together without any interference or adverse effects.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">13</span>
          <span class="faq-text">What should I do if my skin becomes irritated?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            You can put moisturizer on your skin so the patch doesn-t have as much contact as it would otherwise. You can cut the patch down to a smaller size also. If your skin is already irritated, thoroughly cleanse the affected area with mild soap and water to remove any residual gel or adhesive from the patches. Gently pat dry with a clean towel, apply a hypoallergenic moisturizer to help soothe the irritated skin.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span class="faq-num">14</span>
          <span class="faq-text">Can I loan my device to friends and family?</span>
          <div class="faq-icon"></div>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            SAM is a prescription device and therefore should not be loaned to others.
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
      const btn = item.querySelector('.faq-question');
      const answer = item.querySelector('.faq-answer');
      
      btn.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        
        // Close all others
        faqItems.forEach(otherItem => {
          otherItem.classList.remove('active');
          otherItem.querySelector('.faq-answer').style.maxHeight = null;
        });
        
        if (!isActive) {
          item.classList.add('active');
          answer.style.maxHeight = answer.scrollHeight + "px";
        }
      });
    });
  });
</script>
<?php include __DIR__ . '/includes/footer.php'; ?>



<script>
  gsap.registerPlugin(ScrollTrigger);
  document.querySelectorAll(".reveal").forEach((el, index) => {
    gsap.to(el, {
      opacity: 1, y: 0, duration: 0.65, delay: Math.min(index * 0.05, 0.2), ease: "power3.out",
      scrollTrigger: { trigger: el, start: "top 85%" }
    });
  });
</script>
<script src="assets/header-config.js?v=20260622-1"></script>
</body>
</html>















