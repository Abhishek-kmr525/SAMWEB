<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . '/includes/google-tag.php'; ?>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Clinical Studies & Abstracts | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
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
  .btn-dark {  color: var(--white); }
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
    border-radius: 18px;  box-shadow: 0 18px 44px rgba(0,0,0,0.18);
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

  .cta-section {  color: var(--white); text-align: center; padding: 110px 56px; }
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
     border-radius: 20px; overflow: hidden;
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

  .form-section {  padding: 120px 56px; color: var(--white); position: relative; overflow: hidden; }
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

  /* Theme Overrides */
  .evidence-header h2 { color: var(--black) !important; }
  .study-card h4 { color: var(--gray-900) !important; }
  .study-action { color: var(--gray-500) !important; }
  .study-card:hover h4 { color: var(--green-dark) !important; }
  .study-card:hover .study-action { color: var(--black) !important; }
</style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<style>
  .clinical-page {
    background: var(--gray-50);
    color: var(--black);
    padding-bottom: 120px;
    font-family: inherit;
  }
  
  .clinical-hero {
    position: relative;
    width: 100%;
    min-height: 72vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: var(--gray-900);
    color: var(--white);
    text-align: center;
    padding: 180px 24px 100px;
    margin-bottom: 64px;
    overflow: hidden;
  }
  .clinical-hero-bg {
    position: absolute; top: 0; left: 0; width: 100%; height: 100%;
    object-fit: cover; opacity: 0.18; z-index: 0; mix-blend-mode: luminosity;
  }
  .clinical-hero::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(135deg, rgba(194,213,0,0.12) 0%, transparent 55%),
                radial-gradient(circle at 70% 40%, rgba(194,213,0,0.1) 0%, transparent 50%);
    z-index: 1; pointer-events: none;
  }

  .clinical-hero-content {
    position: relative;
    z-index: 2;
    max-width: 860px;
  }
  .clinical-hero h1 {
    font-size: clamp(48px, 6vw, 84px);
    font-weight: 900;
    letter-spacing: -0.035em;
    line-height: 1.05;
    margin-bottom: 24px;
    color: var(--white);
  }
  .clinical-hero p {
    font-size: clamp(17px, 2vw, 21px);
    color: rgba(255,255,255,0.72);
    margin: 0 auto;
    line-height: 1.65;
    max-width: 680px;
  }
  .clinical-layout {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 24px;
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 64px;
    align-items: start;
  }
  
  @media (max-width: 992px) {
    .clinical-layout {
      grid-template-columns: 1fr;
    }
  }

  .nav-sidebar {
    position: sticky;
    top: 120px;
    background: var(--gray-900);
    padding: 32px;
    border-radius: 24px;
    border: 1px solid var(--gray-200);
  }
  
  .nav-sidebar h3 {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: var(--green);
    margin-bottom: 24px;
    font-weight: 800;
  }
  
  .nav-sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
  
  .nav-sidebar a {
    display: block;
    padding: 16px;
    color: var(--gray-300);
    text-decoration: none;
    border-radius: 12px;
    font-weight: 900;
    font-size: 16px;
    transition: all 0.2s;
    background: transparent;
  }
  
  .nav-sidebar a:hover, .nav-sidebar a.active {
    background: rgba(194, 213, 0, 0.1);
    color: var(--green);
  }

  .evidence-section {
    margin-bottom: 80px;
    scroll-margin-top: 120px;
  }
  
  .evidence-header { border-bottom: 2px solid var(--gray-200);
    border-bottom: 2px solid rgba(255,255,255,0.05);
    padding-bottom: 24px;
    margin-bottom: 32px;
    display: flex;
    align-items: center;
    gap: 24px;
  }
  
  .evidence-header h2 { color: var(--black);
    font-size: 40px;
    font-weight: 900;
    letter-spacing: -0.02em;
    color: var(--white);
  }
  
  .badge {
    background: var(--green);
    color: var(--black);
    padding: 6px 16px;
    border-radius: 100px;
    font-weight: 900;
    font-size: 14px;
    letter-spacing: 1px;
    text-transform: uppercase;
  }

  .study-grid {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .study-card {
    display: block;
    text-decoration: none;
    background: var(--white); box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    border: 1px solid var(--gray-200);
    border-radius: 20px;
    padding: 32px;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
  }
  
  .study-card::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0; width: 4px;
    background: var(--green);
    transform: scaleY(0);
    transition: transform 0.4s;
    transform-origin: bottom;
  }
  
  .study-card:hover {
    background: var(--white);
    border-color: var(--green);
    box-shadow: 0 16px 40px rgba(0,0,0,0.08);
    transform: translateX(8px);
  }
  
  .study-card:hover::before {
    transform: scaleY(1);
  }

  .study-card h4 { color: var(--gray-900);
    color: var(--white);
    font-size: 20px;
    line-height: 1.5;
    font-weight: 700;
    margin-bottom: 16px;
    padding-right: 48px;
    transition: color 0.3s;
  }
  
  .study-card:hover h4 {
    color: var(--green);
  }
  
  .study-action { color: var(--gray-500);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--gray-400);
    font-size: 14px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: color 0.3s;
  }
  
  .study-card:hover .study-action { color: var(--green-dark); color: var(--gray-500);
    color: var(--white);
  }
  
  .podcast-banner {
    margin-top: 120px;
    background: var(--gray-900);
    border-radius: 32px;
    padding: 64px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
    border: 1px solid var(--gray-200);
  }
  
  .podcast-banner img {
    width: 100%;
    border-radius: 16px;
    box-shadow: 0 32px 80px rgba(0,0,0,0.4);
  }
  
  .podcast-content h2 { color: var(--white);
    font-size: 40px;
    font-weight: 900;
    margin-bottom: 24px;
    line-height: 1.1;
  }
  
  .podcast-content p { color: var(--white);
    font-size: 18px;
    line-height: 1.7;
  }
  
  @media (max-width: 992px) {
    .podcast-banner { grid-template-columns: 1fr; padding: 40px 24px; }
  }

  /* Theme Overrides */
  .evidence-header h2 { color: var(--black) !important; }
  .study-card h4 { color: var(--gray-900) !important; }
  .study-action { color: var(--gray-500) !important; }
  .study-card:hover h4 { color: var(--green-dark) !important; }
  .study-card:hover .study-action { color: var(--black) !important; }

  /* COMPARISON */
  .comparison-section { background: var(--white); padding: 100px 56px; }
  .comparison-inner { max-width: 1200px; margin: 0 auto; overflow-x: auto; }
  .comparison-header { text-align: center; margin-bottom: 56px; }
  .comparison-table { width: 100%; border-collapse: collapse; text-align: left; font-size: 15px; border-radius: 20px; overflow: hidden; background: var(--white); border: 1px solid var(--gray-300); }
  .comparison-table th, .comparison-table td { padding: 20px 24px; border-bottom: 1px solid var(--gray-300); }
  .comparison-table th { font-weight: 800; text-transform: uppercase; font-size: 14px; letter-spacing: 0.05em; padding-top: 32px; padding-bottom: 32px; }
  .comparison-table thead th:nth-child(1) { width: 20%; background: var(--gray-100); color: var(--black); }
  .comparison-table thead th:nth-child(2) { width: 28%; background: var(--green); color: var(--black); text-align: center; }
  .comparison-table thead th:nth-child(3) { width: 26%; background: var(--gray-100); color: var(--black); text-align: center; }
  .comparison-table thead th:nth-child(4) { width: 26%; background: var(--gray-100); color: var(--black); text-align: center; }
  .comparison-table tbody tr { transition: background 0.2s; }
  .comparison-table tbody tr:hover { background: var(--gray-50); }
  .comparison-table tbody tr:last-child td { border-bottom: none; }
  .comparison-table tbody td:nth-child(1) { color: var(--black); font-weight: 900; background: var(--gray-50); }
  .comparison-table tbody td:nth-child(2) { background: var(--green); color: var(--black); font-weight: 900; border-bottom: 1px solid rgba(0,0,0,0.1); }
  .comparison-table tbody td:nth-child(3) { color: var(--gray-700); }
  .comparison-table tbody td:nth-child(4) { color: var(--gray-700); }

  /* CLINICAL EXPERTS SECTION */
  .clinical-experts-section { background: var(--gray-50); padding: 100px 56px; }
  .clinical-experts-inner { max-width: 1180px; margin: 0 auto; }
  .clinical-expert-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-top: 48px;
  }
  .clinical-expert-card {
    background: var(--white);
    border: 1px solid var(--gray-100);
    border-radius: 18px;
    box-shadow: 0 8px 28px rgba(0,0,0,0.05);
    overflow: hidden;
    transition: transform 0.25s, box-shadow 0.25s;
  }
  .clinical-expert-card:hover { transform: translateY(-4px); box-shadow: 0 18px 45px rgba(0,0,0,0.09); }
  .clinical-expert-photo {
    height: 270px; overflow: hidden; background: var(--green-bg);
    display: grid; place-items: center; padding: 10px;
  }
  .clinical-expert-photo img { width: 100%; height: 100%; object-fit: contain; display: block; }
  .clinical-expert-body { padding: 30px; }
  .clinical-expert-quote { color: var(--green-dark); font-size: 48px; line-height: 0.7; font-weight: 900; margin-bottom: 16px; }
  .clinical-expert-card blockquote { color: var(--gray-700); font-size: 15px; line-height: 1.65; margin-bottom: 22px; font-weight: 900; font-style: italic; }
  .clinical-expert-card h3 { font-size: 17px; font-weight: 900; margin-bottom: 4px; }
  .clinical-expert-card p { color: var(--gray-500); font-size: 13px; line-height: 1.55; }
  @media (max-width: 1040px) { .clinical-expert-grid { grid-template-columns: 1fr; } }
</style>

<main class="clinical-page">
    <section class="clinical-hero reveal">
    <img src="https://samrecover.com/wp-content/uploads/2021/01/Sam_header_1350x300_Black-4.jpg" alt="" class="clinical-hero-bg" aria-hidden="true"/>
    <div class="clinical-hero-content">
      <div style="display: inline-block; background: rgba(194,213,0,0.15); color: var(--green); padding: 8px 16px; border-radius: 100px; font-weight: 800; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; border: 1px solid rgba(194,213,0,0.35); margin-bottom: 24px;">Research &amp; Validation</div>
      <h1>Clinical Studies</h1>
      <p>A comprehensive library of peer-reviewed clinical studies, meta-analyses, and medical abstracts validating the efficacy of Sustained Acoustic Medicine.</p>
    </div>
  </section>

  <div class="clinical-layout">
    
    <aside class="nav-sidebar reveal">
      <h3>Evidence Levels</h3>
      <ul>
        <li><a href="#level-1a">Level 1A Evidence</a></li>
        <li><a href="#level-1b">Level 1B Evidence</a></li>
        <li><a href="#level-4">Level 4 Evidence</a></li>
        <li><a href="#level-5">Level 5 Evidence</a></li>
      </ul>
    </aside>

    <div class="clinical-content">
      
      <!-- LEVEL 1A -->
      <section id="level-1a" class="evidence-section reveal">
        <div class="evidence-header">
          <h2>Level 1A</h2>
          <span class="badge">Meta-Analysis</span>
        </div>
        <div class="study-grid">
          <a href="https://pubmed.ncbi.nlm.nih.gov/34922606/" target="_blank" class="study-card">
            <h4>Sustained acoustic medicine for the treatment of musculoskeletal injuries: a systematic review and meta-analysis</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://www.mdpi.com/2077-0383/10/12/2698" target="_blank" class="study-card">
            <h4>Low-Intensity Continuous Ultrasound Therapies-A Systemic Review of Current State-of-the-Art and Future Perspectives</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7574225/" target="_blank" class="study-card">
            <h4>Sustained acoustic medicine as a nonsurgical and non-opioid knee osteoarthritis treatment option: a health economic cost effectiveness analysis for symptom management</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://pubmed.ncbi.nlm.nih.gov/28338392/" target="_blank" class="study-card">
            <h4>The Effects of Low-Intensity Therapeutic Ultrasound on Measurable Outcomes: A Critically Appraised Topic</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6128661/" target="_blank" class="study-card">
            <h4>Low Intensity Ultrasound for Promoting Soft Tissue Healing: A Systematic Review of the Literature and Medical Technology</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
        </div>
      </section>

      <!-- LEVEL 1B -->
      <section id="level-1b" class="evidence-section reveal">
        <div class="evidence-header">
          <h2>Level 1B</h2>
          <span class="badge">RCTs</span>
        </div>
        <div class="study-grid">
          <a href="https://pmc.ncbi.nlm.nih.gov/articles/PMC11492000/" target="_blank" class="study-card">
            <h4>Sustained acoustic medicine treatment of discogenic chronic low back pain: A randomized, multisite, double-blind, placebo-controlled trial</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC9977165/" target="_blank" class="study-card">
            <h4>Long Duration Sonophoresis of Diclofenac to Augment Rehabilitation of Common Musculoskeletal Injuries</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://pubmed.ncbi.nlm.nih.gov/38213829/" target="_blank" class="study-card">
            <h4>Long Duration Ultrasound Combined with Platelet-Rich Plasma Injection for Return to Sport after Soft Tissue Injury</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://pmc.ncbi.nlm.nih.gov/articles/PMC10485907/" target="_blank" class="study-card">
            <h4>Clinical Diathermy Performance Evaluation of Multi-hour Sustained Acoustic Medicine Treatment with 2.5% Diclofenac Ultrasound Coupling Patch</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://pmc.ncbi.nlm.nih.gov/articles/PMC7287226/" target="_blank" class="study-card">
            <h4>Low-Intensity Continuous Ultrasound for the Symptomatic Treatment of Upper Shoulder and Neck Pain: A Randomized, Double-Blind Placebo-Controlled Clinical Trial</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://pubmed.ncbi.nlm.nih.gov/30326947/" target="_blank" class="study-card">
            <h4>Effect of low-intensity long-duration ultrasound on the symptomatic relief of knee osteoarthritis: a randomized, placebo-controlled double-blind study</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
        </div>
      </section>

      <!-- LEVEL 4 -->
      <section id="level-4" class="evidence-section reveal">
        <div class="evidence-header">
          <h2>Level 4</h2>
          <span class="badge">Clinical Studies</span>
        </div>
        <div class="study-grid">
          <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC9869494/" target="_blank" class="study-card">
            <h4>Evaluation of Sustained Acoustic Medicine for Treating Musculoskeletal Injuries in Military and Sports Medicine</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://pubmed.ncbi.nlm.nih.gov/36687557/" target="_blank" class="study-card">
            <h4>Critical survey and panel review of sustained acoustic medicine in the treatment of sports-related musculoskeletal injuries by professional sports athletic trainers</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7784557/" target="_blank" class="study-card">
            <h4>Sustained Acoustic Medicine Combined with A Diclofenac Ultrasound Coupling Patch for the Rapid Symptomatic Relief of Knee Osteoarthritis: Multi-Site Clinical Efficacy Study</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7544191/" target="_blank" class="study-card">
            <h4>Efficacy of Sustained Acoustic Medicine as an Add-on to Traditional Therapy in Treating Sport-related Injuries</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
        </div>
      </section>

      <!-- LEVEL 5 -->
      <section id="level-5" class="evidence-section reveal">
        <div class="evidence-header">
          <h2>Level 5</h2>
          <span class="badge">Pilot Studies</span>
        </div>
        <div class="study-grid">
          <a href="https://pubmed.ncbi.nlm.nih.gov/34219824/" target="_blank" class="study-card">
            <h4>Skin temperature increase mediated by wearable, long duration, low-intensity therapeutic ultrasound</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC8684070/" target="_blank" class="study-card">
            <h4>Sustained acoustic medicine: wearable, long duration ultrasonic therapy for the treatment of tendinopathy</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
          <a href="https://pubmed.ncbi.nlm.nih.gov/25788823/" target="_blank" class="study-card">
            <h4>Pilot Clinical Studies of Long Duration, Low Intensity Therapeutic Ultrasound for Osteoarthritis</h4>
            <div class="study-action">View Publication &rarr;</div>
          </a>
        </div>
      </section>

    </div>
  </div>

  <!-- COMPARISON -->
  <section class="comparison-section reveal">
    <div class="comparison-inner">
      <div class="comparison-header">
        <div class="section-tag">Comparison</div>
        <h2 class="section-title">The Clear Choice for Healing</h2>
      </div>
      <div style="border-radius: 20px; border: 1px solid var(--gray-300); overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
        <table class="comparison-table">
          <thead>
            <tr>
              <th>Feature</th>
              <th>sam&reg; Treatment</th>
              <th>Traditional Therapy</th>
              <th>Surgical Intervention</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Duration</td>
              <td>1-4 hours daily wearable therapy</td>
              <td>30-60 minutes per session</td>
              <td>Hours + extended recovery time</td>
            </tr>
            <tr>
              <td>Infrastructure</td>
              <td>Portable wearable device</td>
              <td>Clinic dependent</td>
              <td>Hospital required</td>
            </tr>
            <tr>
              <td>Recovery Time</td>
              <td>Faster return to daily activities</td>
              <td>Moderate recovery timeline</td>
              <td>Extended downtime required</td>
            </tr>
            <tr>
              <td>Portability</td>
              <td>Highly portable, usable anywhere</td>
              <td>Not portable</td>
              <td>Not portable</td>
            </tr>
            <tr>
              <td>Long-Term Use</td>
              <td>Supports chronic condition management</td>
              <td>Limited long-term benefit</td>
              <td>Not applicable</td>
            </tr>
            <tr>
              <td>Downtime</td>
              <td>Minimal to none</td>
              <td>Requires time per session</td>
              <td>Significant downtime</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <div class="clinical-layout" style="display: block;">
    <div class="podcast-banner reveal">
      <div class="podcast-image">
        <img src="https://samrecover.com/wp-content/uploads/2025/06/May_Podcast_Twitter-X-1600x900-1.png" alt="Live Yes with Arthritis Podcast">
      </div>
      <div class="podcast-content">
        <div style="color: var(--green); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 16px;">Featured Spotlight</div>
        <h2>Proud Sponsor of the "Live Yes with Arthritis" Podcast</h2>
        <p>In this episode sponsored by ZetrOZ Systems, we get answers about what exactly arthritis is, what it isn't, and what people misunderstand about this group of chronic diseases. Join the conversation with the Arthritis Foundation to learn more about non-invasive recovery.</p>
      </div>
    </div>
  </div>

  <!-- CLINICAL EXPERTS -->
  <section class="clinical-experts-section reveal">
    <div class="clinical-experts-inner">
      <div style="text-align:center; margin-bottom: 0;">
        <div class="section-kicker">Clinical Experts</div>
        <h2 class="section-title">Developed with clinical leaders across sports medicine, therapy,<br>pain management, and biomedical engineering.</h2>
      </div>
      <div class="clinical-expert-grid">
        <article class="clinical-expert-card">
          <div class="clinical-expert-photo">
            <img src="https://pub-ce72dd6475514908a6d97cfa33c7af95.r2.dev/Dr.%20Thomas%20Best%2C%20MD%2C%20PHD.jpg" alt="Dr. Thomas Best, MD, PhD"/>
          </div>
          <div class="clinical-expert-body">
            <div class="clinical-expert-quote">&ldquo;</div>
            <blockquote>sam&reg; is clinically proven to reduce pain and restore function in patients with osteoarthritis.</blockquote>
            <h3>Dr. Thomas Best, MD, PhD</h3>
            <p>Professor of Medicine, University of Miami, FL. Sports medicine and arthritis management physician.</p>
          </div>
        </article>
        <article class="clinical-expert-card">
          <div class="clinical-expert-photo">
            <img src="https://pub-ce72dd6475514908a6d97cfa33c7af95.r2.dev/Dr.%20Kevin%20Wilk%2C%20DPT.jpg" alt="Dr. Kevin Wilk, DPT"/>
          </div>
          <div class="clinical-expert-body">
            <div class="clinical-expert-quote">&ldquo;</div>
            <blockquote>sam&reg; is the only FDA cleared multi-hour wearable ultrasound.</blockquote>
            <h3>Dr. Kevin Wilk, DPT</h3>
            <p>Associate Clinical Director, Champion Sports Medicine, Birmingham, AL. Rehabilitation educator for elite athletes.</p>
          </div>
        </article>
        <article class="clinical-expert-card">
          <div class="clinical-expert-photo">
            <img src="https://pub-ce72dd6475514908a6d97cfa33c7af95.r2.dev/Dr.%20Ralph%20Ortiz%2C%20DO%2C%20MPH.jpg" alt="Dr. Ralph Ortiz, DO, MPH"/>
          </div>
          <div class="clinical-expert-body">
            <div class="clinical-expert-quote">&ldquo;</div>
            <blockquote>sam&reg; is an effective drug-free option to help my patients heal.</blockquote>
            <h3>Dr. Ralph Ortiz, DO, MPH</h3>
            <p>Director of Medicine and Pain Management Faculty, Cayuga Medical Center, Ithaca, NY.</p>
          </div>
        </article>
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




















