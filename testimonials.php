<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Patient Testimonials | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
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
    position: relative; z-index: 1; width: 100%; height: auto; display: block;
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
    background: #050505; color: var(--white); position: relative; overflow: hidden;
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
    background: var(--black); border-radius: 20px; overflow: hidden;
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
  
  .a-card-body { position: absolute; bottom: 0; left: 0; right: 0; padding: 26px; z-index: 2; color: var(--white); display: flex; flex-direction: column; justify-content: flex-end; height: 100%; }
  .a-card-body h3 { font-size: 22px; font-weight: 800; margin-bottom: 6px; text-shadow: 0 2px 4px rgba(0,0,0,0.5); transform: translateY(20px); transition: transform 0.4s ease; }
  .a-card-body p { font-size: 14px; color: rgba(255,255,255,0.9); line-height: 1.6; text-shadow: 0 1px 2px rgba(0,0,0,0.5); opacity: 0; transform: translateY(20px); transition: all 0.4s ease; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; }
  .a-card-body p::before { content: ''; display: block; width: 30px; height: 2px; background: var(--green); margin-bottom: 12px; margin-top: 12px; opacity: 0; transition: opacity 0.4s ease; }
  
  .ambassador-card:hover .a-card-body h3 { transform: translateY(0); color: var(--green); }
  .ambassador-card:hover .a-card-body p { opacity: 1; transform: translateY(0); }
  .ambassador-card:hover .a-card-body p::before { opacity: 1; }

  .form-section { background: var(--black); padding: 120px 56px; color: var(--white); position: relative; overflow: hidden; }
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
  .form-benefit-text { font-size: 17px; font-weight: 900; }
  
  .form-container { 
    background: rgba(255,255,255,0.03); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1); 
    border-radius: 28px; padding: 48px; box-shadow: 0 30px 60px rgba(0,0,0,0.3); 
  }
  .form-group { margin-bottom: 20px; }
  .form-group label { display: block; font-size: 13px; font-weight: 700; color: rgba(255,255,255,0.7); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.05em; }
  .form-group input, .form-group textarea { 
    width: 100%; padding: 14px 16px; border-radius: 12px; font-family: "Inter", sans-serif; font-size: 15px; transition: all 0.2s; box-sizing: border-box;
    background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: var(--white); 
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
  .testimonials-hero {
    padding: 180px 24px 80px;
    text-align: center;
    background: var(--white);
  }
  .testimonials-hero h1 {
    font-size: clamp(48px, 6vw, 72px);
    font-weight: 900;
    margin-bottom: 24px;
    letter-spacing: -0.03em;
  }
  .testimonials-hero p {
    font-size: 20px;
    color: var(--gray-500);
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.6;
  }

  .video-grid {
    max-width: 1200px;
    margin: 0 auto 120px;
    padding: 0 24px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 48px;
  }

  .video-card {
    background: var(--white);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 24px 60px rgba(0,0,0,0.05);
    transition: transform 0.4s;
  }
  .video-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 60px rgba(194, 213, 0, 0.25);
  }

  .video-frame {
    position: relative;
    padding-bottom: 56.25%;
    background: #000;
  }
  .video-frame iframe {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    border: none;
  }
  .video-info {
    padding: 32px;
  }
  .video-info h3 {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 8px;
  }
  .video-info p {
    color: var(--gray-500);
    font-size: 15px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--green);
  }

  /* Make the first video span full width */
  .featured-video {
    grid-column: 1 / -1;
  }
  .featured-video .video-info h3 {
    font-size: 32px;
  }

  @media (max-width: 768px) {
    .video-grid {
      grid-template-columns: 1fr;
    }
  }

  .marquee-section {
    background: var(--black);
    color: var(--white);
    padding: 100px 0;
    overflow: hidden;
  }
  .marquee-header {
    text-align: center;
    margin-bottom: 64px;
    padding: 0 24px;
  }
  .marquee-header h2 {
    font-size: 48px;
    font-weight: 900;
    letter-spacing: -0.02em;
  }

  .marquee-container {
    display: flex;
    white-space: nowrap;
    overflow: hidden;
    position: relative;
    width: 100%;
  }

  .marquee-track {
    display: flex;
    animation: scroll 40s linear infinite;
    width: max-content;
  }

  .marquee-track:hover {
    animation-play-state: paused;
  }

  @keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }

  .quote-card { transition: all 0.4s;
    background: var(--gray-900);
    border-radius: 20px;
    border-top: 4px solid var(--green);
    padding: 40px;
    margin: 0 16px;
    width: 450px;
    white-space: normal;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

    .quote-card:hover {
    box-shadow: 0 16px 40px rgba(194, 213, 0, 0.2);
    transform: translateY(-8px);
  }

  .quote-card p {
    font-size: 16px;
    line-height: 1.7;
    color: var(--gray-300);
    margin-bottom: 32px;
  }

  .quote-author h4 {
    color: var(--white);
    font-size: 18px;
    font-weight: 800;
    margin-bottom: 4px;
  }
  .quote-author span {
    color: var(--green);
    font-size: 14px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
</style>

<main>
  <section class="testimonials-hero reveal">
    <h1>Patient Stories</h1>
    <p>Hear directly from military veterans, elite athletes, and medical professionals who use sam&reg; to accelerate healing and eliminate pain.</p>
  </section>

  <section class="video-grid reveal">
    
    <div class="video-card featured-video reveal" style="transition-delay: 0.1s;">
      <div class="video-frame">
        <iframe src="https://www.youtube.com/embed/FCOQKwSXq3Y?autoplay=1&loop=1&playlist=FCOQKwSXq3Y&mute=1&controls=0&cc_load_policy=0&iv_load_policy=3" title="Shoulder Injury and Chronic Pain" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="video-info">
        <p>US Veterans Treated</p>
        <h3>Shoulder Injury and Chronic Pain</h3>
      </div>
    </div>

    <div class="video-card reveal" style="transition-delay: 0.2s;">
      <div class="video-frame">
        <iframe src="https://www.youtube.com/embed/0qIj7NguhHM?autoplay=1&loop=1&playlist=0qIj7NguhHM&mute=1&controls=0&cc_load_policy=0&iv_load_policy=3" title="Knee Pain After Surgery" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="video-info">
        <p>US Veterans Treated</p>
        <h3>Knee Pain After Surgery</h3>
      </div>
    </div>

    <div class="video-card reveal" style="transition-delay: 0.3s;">
      <div class="video-frame">
        <iframe src="https://www.youtube.com/embed/bZQ7UhNwDQk?autoplay=1&loop=1&playlist=bZQ7UhNwDQk&mute=1&controls=0&cc_load_policy=0&iv_load_policy=3" title="Reducing Narcotic Use in Hip and Back Pain" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="video-info">
        <p>US Veterans Treated</p>
        <h3>Reducing Narcotic Use in Hip and Back Pain</h3>
      </div>
    </div>

    <div class="video-card reveal" style="transition-delay: 0.4s;">
      <div class="video-frame">
        <iframe src="https://www.youtube.com/embed/8ForpdhHTCg?autoplay=1&loop=1&playlist=8ForpdhHTCg&mute=1&controls=0&cc_load_policy=0&iv_load_policy=3" title="Shoulder Tendon Injury Treatment" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="video-info">
        <p>Medical Professional</p>
        <h3>Shoulder Tendon Injury Treatment</h3>
      </div>
    </div>

    <div class="video-card reveal" style="transition-delay: 0.5s;">
      <div class="video-frame">
        <iframe src="https://www.youtube.com/embed/vL_mCspsqwM?autoplay=1&loop=1&playlist=vL_mCspsqwM&mute=1&controls=0&cc_load_policy=0&iv_load_policy=3" title="Shoulder Tendon Injury Treatment" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="video-info">
        <p>Active Duty Soldier</p>
        <h3>How sam&reg; Heals an Active Duty Soldier</h3>
      </div>
    </div>

  </section>

  <section class="marquee-section">
    <div class="marquee-header reveal">
      <h2>Elite Athletes &amp; Medical Staff</h2>
    </div>
    
    <div class="marquee-container">
      <div class="marquee-track">
        
        <!-- FIRST SET OF QUOTES -->
        <div class="quote-card">
          <p>"I have used sam&reg; for hip flexor tendonitis with excellent results. Key is to properly educate the student athlete on proper pad placement and use."</p>
          <div class="quote-author">
            <h4>Michelle Barber</h4>
            <span>Assoc. Athletic Therapist</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"Since I have received a sam&reg; unit, it has made recovery and rehab on the road and in-house so much easier. It is a great tool to use for recovery with our pitchers, once their outing is over."</p>
          <div class="quote-author">
            <h4>Bobby Stachura MS ATC</h4>
            <span>Boston Red Sox</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"We used the sam&reg; ultrasound unit as a means of long-duration Phonophoresis with one of our players dealing with a chronic groin strain... we were able to progress him back into playing unrestricted within a few weeks."</p>
          <div class="quote-author">
            <h4>Ryan Bitzel Physical Therapist</h4>
            <span>Seattle Mariners</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"sam&reg; is our 'Go To' modality to help our players. I have seen the some of the best benefit come from its use as a recovery/treatment for chronic adductor tendinosis."</p>
          <div class="quote-author">
            <h4>Rick Guter Head Athletic Trainer</h4>
            <span>Team USA Women's Soccer</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"The best part about the sam&reg; is the compliance rate I find with athletes. It is extremely user friendly and convenient. Our athletes love the ease and the results."</p>
          <div class="quote-author">
            <h4>Emily Fortunato Head Athletic Trainer</h4>
            <span>Washington Mystics, WNBA</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"Immediately my athlete said that the sam&reg; made him feel better. I truly believe that the sam&reg; works! This modality works. I would highly recommend it."</p>
          <div class="quote-author">
            <h4>B.J. Duplantis, Jr. Assistant Athletic Trainer</h4>
            <span>University of Louisiana at Lafayette</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"For those who respond well with the device they can feel the improvement immediately and time of recovery has shortened tremendously especially when used with manual therapy techniques."</p>
          <div class="quote-author">
            <h4>Yuko Kimura, USA Field Hockey</h4>
            <span>Women's National Team Medical Manager</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"With the sam&reg; we have been able to eliminate symptoms and accelerate healing in just a few sessions. What I like the most is the ability to deliver quality treatment to the student athlete."</p>
          <div class="quote-author">
            <h4>Matthew Brown Assistant Athletic Trainer</h4>
            <span>University of South Alabama Basketball</span>
          </div>
        </div>

        <!-- DUPLICATE SET OF QUOTES FOR INFINITE LOOP -->
        <div class="quote-card">
          <p>"I have used sam&reg; for hip flexor tendonitis with excellent results. Key is to properly educate the student athlete on proper pad placement and use."</p>
          <div class="quote-author">
            <h4>Michelle Barber</h4>
            <span>Assoc. Athletic Therapist</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"Since I have received a sam&reg; unit, it has made recovery and rehab on the road and in-house so much easier. It is a great tool to use for recovery with our pitchers, once their outing is over."</p>
          <div class="quote-author">
            <h4>Bobby Stachura MS ATC</h4>
            <span>Boston Red Sox</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"We used the sam&reg; ultrasound unit as a means of long-duration Phonophoresis with one of our players dealing with a chronic groin strain... we were able to progress him back into playing unrestricted within a few weeks."</p>
          <div class="quote-author">
            <h4>Ryan Bitzel Physical Therapist</h4>
            <span>Seattle Mariners</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"sam&reg; is our 'Go To' modality to help our players. I have seen the some of the best benefit come from its use as a recovery/treatment for chronic adductor tendinosis."</p>
          <div class="quote-author">
            <h4>Rick Guter Head Athletic Trainer</h4>
            <span>Team USA Women's Soccer</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"The best part about the sam&reg; is the compliance rate I find with athletes. It is extremely user friendly and convenient. Our athletes love the ease and the results."</p>
          <div class="quote-author">
            <h4>Emily Fortunato Head Athletic Trainer</h4>
            <span>Washington Mystics, WNBA</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"Immediately my athlete said that the sam&reg; made him feel better. I truly believe that the sam&reg; works! This modality works. I would highly recommend it."</p>
          <div class="quote-author">
            <h4>B.J. Duplantis, Jr. Assistant Athletic Trainer</h4>
            <span>University of Louisiana at Lafayette</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"For those who respond well with the device they can feel the improvement immediately and time of recovery has shortened tremendously especially when used with manual therapy techniques."</p>
          <div class="quote-author">
            <h4>Yuko Kimura, USA Field Hockey</h4>
            <span>Women's National Team Medical Manager</span>
          </div>
        </div>
        <div class="quote-card">
          <p>"With the sam&reg; we have been able to eliminate symptoms and accelerate healing in just a few sessions. What I like the most is the ability to deliver quality treatment to the student athlete."</p>
          <div class="quote-author">
            <h4>Matthew Brown Assistant Athletic Trainer</h4>
            <span>University of South Alabama Basketball</span>
          </div>
        </div>

      </div>
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
</script>
<script src="assets/header-config.js?v=20260911-1"></script>
</body>
</html>














