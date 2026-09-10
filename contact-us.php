<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us | Sam&reg;&#65039; Sustained Acoustic Medicine</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <style>
    :root {
      --gray-200: #e5e7eb;
      --gray-400: #9ca3af;
      --gray-600: #4b5563;
      --gray-800: #1f2937;
    }

    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

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

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: "Inter", sans-serif;
      color: var(--black);
      background: var(--white);
      overflow-x: hidden;
    }

    a {
      color: inherit;
    }

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

    .header-logo {
      pointer-events: auto;
      justify-self: start;
    }

    .header-logo img {
      height: 48px;
      display: block;
    }

    .nav-pill {
      pointer-events: auto;
      justify-self: center;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(20px);
      border: 1px solid var(--gray-300);
      border-radius: 100px;
      padding: 0 16px;
      display: flex;
      align-items: center;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .nav-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .nav-links>li {
      position: relative;
    }

    .nav-links>li>a {
      color: var(--gray-700);
      text-decoration: none;
      font-size: 13px;
      font-weight: 700;
      padding: 16px 18px;
      display: block;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      transition: color 0.2s;
    }

    .nav-links>li>a:hover,
    .nav-links>li>a.active {
      color: var(--green-dark);
    }

    .dropdown {
      position: absolute;
      top: 100%;
      left: 50%;
      transform: translateX(-50%) translateY(10px);
      background: rgba(255, 255, 255, 0.95);
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

    .nav-links>li:hover>.dropdown {
      opacity: 1;
      visibility: visible;
      transform: translateX(-50%) translateY(0);
    }

    .dropdown li {
      position: relative;
      display: block;
    }

    .dropdown a {
      color: var(--gray-700);
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      padding: 10px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: all 0.2s;
    }

    .dropdown a:hover {
      color: var(--green-dark);
      background: var(--white);
    }

    .sub-dropdown {
      position: absolute;
      top: -12px;
      left: 100%;
      transform: translateX(10px);
      background: rgba(255, 255, 255, 0.95);
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

    .dropdown li:hover>.sub-dropdown {
      opacity: 1;
      visibility: visible;
      transform: translateX(4px);
    }

    .hero {
      min-height: 92vh;
      padding: 140px 56px 82px;
      display: grid;
      grid-template-columns: minmax(0, 0.95fr) minmax(420px, 1.05fr);
      gap: 64px;
      align-items: center;
      max-width: 1280px;
      margin: 0 auto;
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--green-bg);
      border: 1px solid var(--green-pale);
      color: var(--green-dark);
      padding: 7px 16px;
      border-radius: 100px;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      margin-bottom: 24px;
    }

    .hero-copy,
    .hero-media,
    .reveal {
      opacity: 0;
      transform: translateY(28px);
    }

    .hero h1 {
      font-size: clamp(42px, 5.2vw, 74px);
      font-weight: 900;
      line-height: 0.98;
      letter-spacing: -0.04em;
      margin-bottom: 26px;
    }

    .accent {
      color: var(--green-dark);
    }

    .hero p {
      color: var(--gray-500);
      font-size: 18px;
      line-height: 1.75;
      max-width: 620px;
    }

    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      margin-top: 38px;
    }

    .btn-primary,
    .btn-outline,
    .btn-dark {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 48px;
      padding: 14px 28px;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 800;
      text-decoration: none;
      transition: all 0.2s;
    }

    .btn-primary {
      background: var(--green);
      color: var(--black);
      box-shadow: 0 8px 24px rgba(194, 213, 0, 0.22);
    }

    .btn-primary:hover {
      background: var(--green-dark);
      transform: translateY(-1px);
    }

    .btn-outline {
      background: transparent;
      color: var(--black);
      border: 2px solid var(--gray-300);
    }

    .btn-outline:hover {
      border-color: var(--green);
      color: var(--green-dark);
    }

    .btn-dark {
      background: var(--black);
      color: var(--white);
    }

    .btn-dark:hover {
      background: var(--gray-900);
      transform: translateY(-1px);
    }

    .media-frame {
      position: relative;
      border-radius: 28px;
      padding: 16px;
      background: var(--green);
      box-shadow: 0 28px 80px rgba(0, 0, 0, 0.14);
    }

    .media-frame::before {
      content: "";
      position: absolute;
      inset: 0;
      border-radius: 28px;
      background-image: radial-gradient(rgba(0, 0, 0, 0.12) 3px, transparent 3px);
      background-size: 34px 34px;
    }

    .media-frame video,
    .media-frame img {
      position: relative;
      z-index: 1;
      width: 100%;
      height: auto;
      display: block;
      border-radius: 18px;
      background: var(--black);
      box-shadow: 0 18px 44px rgba(0, 0, 0, 0.18);
    }

    .media-chip {
      position: absolute;
      z-index: 2;
      right: -18px;
      bottom: 28px;
      max-width: 230px;
      background: var(--white);
      border: 1px solid var(--gray-100);
      border-radius: 14px;
      padding: 18px 20px;
      box-shadow: 0 16px 38px rgba(0, 0, 0, 0.14);
    }

    .chip-num {
      color: var(--green-dark);
      font-size: 28px;
      line-height: 1;
      font-weight: 900;
      letter-spacing: -0.03em;
    }

    .chip-label {
      color: var(--gray-500);
      font-size: 12px;
      line-height: 1.45;
      margin-top: 5px;
      font-weight: 900;
    }

    section {
      padding: 96px 56px;
    }

    .section-inner {
      max-width: 1160px;
      margin: 0 auto;
    }

    .section-kicker {
      color: var(--green-dark);
      font-size: 13px;
      font-weight: 900;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 12px;
    }

    .section-title {
      font-size: clamp(30px, 3.5vw, 50px);
      font-weight: 900;
      letter-spacing: -0.035em;
      line-height: 1.08;
    }

    .section-copy {
      color: var(--gray-500);
      font-size: 16px;
      line-height: 1.75;
      max-width: 720px;
      margin-top: 16px;
    }

    .proof-section {
      background: var(--gray-900);
      color: var(--white);
      padding: 58px 56px;
    }

    .proof-layout {
      max-width: 1160px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 0.9fr 1.1fr;
      gap: 42px;
      align-items: center;
    }

    .proof-copy h2 {
      font-size: clamp(28px, 3.2vw, 44px);
      line-height: 1.08;
      letter-spacing: -0.03em;
      margin-bottom: 14px;
    }

    .proof-copy p {
      color: rgba(255, 255, 255, 0.68);
      font-size: 16px;
      line-height: 1.7;
    }

    .proof-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 14px;
    }

    .proof-card {
      min-height: 112px;
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 14px;
      padding: 22px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .proof-card strong {
      display: block;
      color: var(--green);
      font-size: 26px;
      line-height: 1.05;
      letter-spacing: -0.03em;
      margin-bottom: 6px;
    }

    .proof-card span {
      display: block;
      color: rgba(255, 255, 255, 0.72);
      font-size: 13px;
      line-height: 1.45;
      font-weight: 900;
    }

    .science-section {
      background: var(--white);
    }

    .science-layout {
      display: grid;
      grid-template-columns: 0.85fr 1.15fr;
      gap: 54px;
      align-items: start;
    }

    .science-card {
      background: var(--white);
      border: 1px solid var(--gray-100);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 12px 36px rgba(0, 0, 0, 0.05);
    }

    .science-card img {
      width: 100%;
      height: 320px;
      object-fit: cover;
      display: block;
    }

    .science-card .body {
      padding: 26px;
    }

    .science-card h3 {
      font-size: 20px;
      line-height: 1.2;
      margin-bottom: 10px;
    }

    .science-card p {
      color: var(--gray-500);
      line-height: 1.65;
      font-size: 14px;
    }

    .pathway-list {
      display: grid;
      gap: 16px;
      margin-top: 32px;
    }

    .pathway {
      background: var(--white);
      border: 1px solid var(--gray-100);
      border-radius: 14px;
      padding: 22px;
      display: grid;
      grid-template-columns: 52px 1fr;
      gap: 18px;
      transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
    }

    .pathway:hover {
      border-color: var(--green-pale);
      transform: translateY(-2px);
      box-shadow: 0 12px 36px rgba(0, 0, 0, 0.06);
    }

    .pathway-num {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: var(--green);
      color: var(--black);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 900;
      font-size: 18px;
    }

    .pathway h3 {
      font-size: 17px;
      margin-bottom: 6px;
    }

    .pathway p {
      color: var(--gray-500);
      font-size: 14px;
      line-height: 1.6;
    }

    .protocol-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 28px;
      margin-top: 48px;
    }

    .protocol-card {
      background: var(--white);
      border: 1px solid var(--gray-100);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 28px rgba(0, 0, 0, 0.05);
      transition: transform 0.25s, box-shadow 0.25s, border-color 0.25s;
    }

    .protocol-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 18px 44px rgba(0, 0, 0, 0.1);
      border-color: var(--green-pale);
    }

    .protocol-media {
      height: 300px;
      background: var(--gray-100);
      overflow: hidden;
    }

    .protocol-media img,
    .protocol-media video {
      width: 100%;
      height: 100%;
      object-fit: contain;
      display: block;
    }

    .protocol-body {
      padding: 26px;
    }

    .tag {
      display: inline-flex;
      background: var(--green-bg);
      color: var(--green-dark);
      border: 1px solid var(--green-pale);
      border-radius: 100px;
      padding: 5px 11px;
      font-size: 11px;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-bottom: 13px;
    }

    .protocol-body h3 {
      font-size: 19px;
      margin-bottom: 9px;
      line-height: 1.2;
    }

    .protocol-body p {
      color: var(--gray-500);
      font-size: 14px;
      line-height: 1.65;
    }

    .evidence-band {
      background: var(--green-bg);
    }

    .evidence-layout {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 56px;
      align-items: center;
    }

    .evidence-panel {
      background: var(--white);
      border: 1px solid var(--green-pale);
      border-radius: 20px;
      padding: 28px;
      box-shadow: 0 14px 44px rgba(194, 213, 0, 0.12);
    }

    .evidence-row {
      display: grid;
      grid-template-columns: 120px 1fr;
      gap: 18px;
      padding: 18px 0;
      border-bottom: 1px solid var(--gray-100);
    }

    .evidence-row:last-child {
      border-bottom: 0;
    }

    .evidence-row strong {
      color: var(--black);
      font-size: 15px;
    }

    .evidence-row span {
      color: var(--gray-500);
      font-size: 14px;
      line-height: 1.55;
    }

    .resource-card {
      display: grid;
      grid-template-columns: 220px 1fr;
      gap: 28px;
      align-items: center;
      background: var(--gray-900);
      color: var(--white);
      border-radius: 22px;
      padding: 28px;
      overflow: hidden;
    }

    .resource-card img {
      width: 100%;
      min-height: 220px;
      object-fit: cover;
      border-radius: 14px;
      background: var(--white);
    }

    .resource-card p {
      color: rgba(255, 255, 255, 0.66);
      line-height: 1.7;
      margin: 12px 0 24px;
    }

    .cta-section {
      background: var(--black);
      color: var(--white);
      text-align: center;
      padding: 110px 56px;
    }

    .cta-section h2 {
      font-size: clamp(32px, 4vw, 56px);
      font-weight: 900;
      letter-spacing: -0.035em;
      margin-bottom: 18px;
    }

    .cta-section p {
      max-width: 680px;
      margin: 0 auto 36px;
      color: #94a3b8;
      line-height: 1.7;
      font-size: 18px;
    }

    .cta-actions {
      display: flex;
      justify-content: center;
      gap: 14px;
      flex-wrap: wrap;
    }

    .btn-white {
      background: var(--green);
      color: var(--black);
      padding: 16px 34px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 800;
      text-decoration: none;
      transition: all 0.2s;
    }

    .btn-white:hover {
      background: var(--green-dark);
      transform: translateY(-1px);
    }

    .btn-bordered {
      background: transparent;
      color: var(--white);
      border: 2px solid rgba(255, 255, 255, 0.26);
      padding: 16px 34px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.2s;
    }

    .btn-bordered:hover {
      border-color: var(--white);
      background: rgba(255, 255, 255, 0.08);
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

    .footer-logo img {
      height: 30px;
      opacity: 0.7;
    }

    .footer-copy {
      color: #6b7280;
      font-size: 13px;
    }

    .footer-links a {
      color: #6b7280;
      text-decoration: none;
      font-size: 13px;
      margin-left: 24px;
      transition: color 0.2s;
    }

    .footer-links a:hover {
      color: var(--white);
    }

    @media (max-width: 1040px) {
      header {
        padding: 20px 24px;
        grid-template-columns: 1fr auto;
      }

      .nav-pill {
        justify-self: end;
        max-width: calc(100vw - 140px);
        overflow-x: auto;
        border-radius: 18px;
      }

      .nav-links>li>a {
        white-space: nowrap;
        padding: 14px 14px;
      }

      .hero {
        grid-template-columns: 1fr;
        padding: 120px 24px 70px;
      }

      .hero-media {
        max-width: 720px;
      }

      .media-frame video,
      .media-frame img {
        height: auto;
      }

      section,
      .proof-section,
      .cta-section {
        padding-left: 24px;
        padding-right: 24px;
      }

      .proof-layout,
      .proof-grid,
      .protocol-grid,
      .evidence-layout,
      .science-layout {
        grid-template-columns: 1fr;
      }

      .resource-card {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 720px) {
      header {
        position: static;
        display: block;
        padding: 18px;
      }

      .header-logo img {
        height: 38px;
        margin-bottom: 14px;
      }

      .nav-pill {
        width: 100%;
        max-width: none;
        justify-content: flex-start;
      }

      .dropdown,
      .sub-dropdown {
        display: none;
      }

      .hero {
        padding-top: 44px;
      }

      .hero h1 {
        font-size: 42px;
      }

      .hero p {
        font-size: 16px;
      }

      .media-frame {
        padding: 10px;
        border-radius: 20px;
      }

      .media-frame video,
      .media-frame img {
        height: auto;
        border-radius: 14px;
      }

      .media-chip {
        position: relative;
        right: auto;
        bottom: auto;
        margin: 12px 0 0;
        max-width: none;
      }

      .protocol-grid {
        gap: 18px;
      }

      .evidence-row {
        grid-template-columns: 1fr;
        gap: 6px;
      }

      footer {
        flex-direction: column;
        align-items: flex-start;
        padding: 32px 24px;
      }

      .footer-links a {
        margin: 0 18px 0 0;
      }
    }

    .faces-hero {
      min-height: 90vh;
      padding: 160px 56px 120px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 64px;
      align-items: center;
      background: #050505;
      color: var(--white);
      position: relative;
      overflow: hidden;
    }

    .faces-hero::before {
      content: '';
      position: absolute;
      top: -20%;
      right: -10%;
      width: 60%;
      height: 60%;
      background: radial-gradient(circle, rgba(194, 213, 0, 0.15) 0%, transparent 60%);
      z-index: 0;
      filter: blur(60px);
    }

    .faces-hero img.hero-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.15;
      z-index: 0;
      mix-blend-mode: luminosity;
    }

    .faces-hero-inner {
      position: relative;
      z-index: 1;
      max-width: 600px;
      justify-self: end;
    }

    .faces-hero-media {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 600px;
      justify-self: start;
      perspective: 1000px;
    }

    .video-wrapper {
      position: relative;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(255, 255, 255, 0.1);
      transform: rotateY(-5deg) rotateX(5deg);
      transition: transform 0.5s ease;
    }

    .video-wrapper:hover {
      transform: rotateY(0deg) rotateX(0deg);
    }

    .video-wrapper iframe {
      display: block;
      width: 100%;
      height: 400px;
    }

    .section-tag {
      display: inline-flex;
      align-items: center;
      background: rgba(194, 213, 0, 0.15);
      border: 1px solid var(--green);
      color: var(--green);
      padding: 6px 14px;
      border-radius: 100px;
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      margin-bottom: 20px;
    }

    .faces-hero h1 {
      font-size: clamp(38px, 4.5vw, 64px);
      font-weight: 900;
      line-height: 1.05;
      letter-spacing: -0.03em;
      margin-bottom: 24px;
    }

    .faces-hero p {
      font-size: 18px;
      color: var(--gray-300);
      line-height: 1.65;
      margin-bottom: 30px;
    }

    .ambassadors-section {
      padding: 120px 56px;
      background: var(--white);
      position: relative;
    }

    .ambassadors-header {
      text-align: center;
      max-width: 700px;
      margin: 0 auto 64px;
    }

    .ambassadors-header h2 {
      font-size: clamp(32px, 4vw, 48px);
      font-weight: 900;
      letter-spacing: -0.03em;
      margin-bottom: 16px;
    }

    .ambassadors-header p {
      color: var(--gray-500);
      font-size: 18px;
      line-height: 1.6;
    }

    .ambassadors-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 32px;
      max-width: 1300px;
      margin: 0 auto;
    }

    .ambassador-card {
      background: var(--black);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      position: relative;
      cursor: pointer;
      height: 380px;
      border: none;
      opacity: 0;
      transform: translateY(28px);
    }

    .ambassador-card::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 75%;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.4) 60%, transparent 100%);
      pointer-events: none;
      z-index: 1;
      transition: height 0.4s ease;
    }

    .ambassador-card::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 20px;
      box-shadow: inset 0 0 0 3px var(--green);
      opacity: 0;
      transition: opacity 0.4s ease;
      pointer-events: none;
      z-index: 3;
    }

    .ambassador-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 24px 48px rgba(0, 0, 0, 0.15);
      z-index: 10;
    }

    .ambassador-card:hover::before {
      opacity: 1;
    }

    .ambassador-card:hover::after {
      height: 95%;
    }

    .ambassador-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
      position: absolute;
      inset: 0;
      z-index: 0;
    }

    .ambassador-card:hover img {
      transform: scale(1.08);
    }

    .a-card-body {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 26px;
      z-index: 2;
      color: var(--white);
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      height: 100%;
    }

    .a-card-body h3 {
      font-size: 22px;
      font-weight: 800;
      margin-bottom: 6px;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
      transform: translateY(20px);
      transition: transform 0.4s ease;
    }

    .a-card-body p {
      font-size: 14px;
      color: rgba(255, 255, 255, 0.9);
      line-height: 1.6;
      text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.4s ease;
      display: -webkit-box;
      -webkit-line-clamp: 4;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .a-card-body p::before {
      content: '';
      display: block;
      width: 30px;
      height: 2px;
      background: var(--green);
      margin-bottom: 12px;
      margin-top: 12px;
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .ambassador-card:hover .a-card-body h3 {
      transform: translateY(0);
      color: var(--green);
    }

    .ambassador-card:hover .a-card-body p {
      opacity: 1;
      transform: translateY(0);
    }

    .ambassador-card:hover .a-card-body p::before {
      opacity: 1;
    }

    .form-section {
      background: var(--black);
      padding: 120px 56px;
      color: var(--white);
      position: relative;
      overflow: hidden;
    }

    .form-section::before {
      content: '';
      position: absolute;
      bottom: -20%;
      left: -10%;
      width: 50%;
      height: 50%;
      background: radial-gradient(circle, rgba(194, 213, 0, 0.15) 0%, transparent 60%);
      z-index: 0;
      filter: blur(60px);
    }

    .form-layout {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: center;
      position: relative;
      z-index: 1;
    }

    .form-copy h2 {
      font-size: clamp(38px, 4vw, 54px);
      font-weight: 900;
      letter-spacing: -0.03em;
      margin-bottom: 24px;
      line-height: 1.1;
    }

    .form-copy p {
      color: var(--gray-300);
      font-size: 18px;
      line-height: 1.7;
      margin-bottom: 42px;
    }

    .form-benefits {
      display: grid;
      gap: 24px;
    }

    .form-benefit {
      display: flex;
      align-items: center;
      gap: 18px;
    }

    .form-benefit-icon {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: rgba(194, 213, 0, 0.1);
      color: var(--green);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      border: 1px solid rgba(194, 213, 0, 0.2);
    }

    .form-benefit-text {
      font-size: 17px;
      font-weight: 900;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 28px;
      padding: 48px;
      box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-size: 13px;
      font-weight: 700;
      color: rgba(255, 255, 255, 0.7);
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 14px 16px;
      border-radius: 12px;
      font-family: "Inter", sans-serif;
      font-size: 15px;
      transition: all 0.2s;
      box-sizing: border-box;
      background: rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: var(--white);
    }

    .form-group input:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: var(--green);
      background: rgba(0, 0, 0, 0.5);
      box-shadow: 0 0 0 3px rgba(194, 213, 0, 0.1);
    }

    .btn-submit {
      width: 100%;
      padding: 18px;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 800;
      cursor: pointer;
      transition: all 0.2s;
      margin-top: 10px;
      border: none;
      background: var(--green);
      color: var(--black);
      box-shadow: 0 10px 20px rgba(194, 213, 0, 0.2);
    }

    .btn-submit:hover {
      background: var(--green-dark);
      box-shadow: 0 15px 30px rgba(194, 213, 0, 0.3);
      transform: translateY(-2px);
    }

    @media (max-width: 900px) {
      .faces-hero {
        grid-template-columns: 1fr;
        text-align: center;
        padding: 140px 24px 80px;
        gap: 40px;
      }

      .faces-hero-inner,
      .faces-hero-media {
        justify-self: center;
      }

      .video-wrapper {
        transform: none;
      }

      .video-wrapper:hover {
        transform: none;
      }

      .ambassadors-section {
        padding: 80px 24px;
      }

      .form-section {
        padding: 80px 24px;
      }

      .form-layout {
        grid-template-columns: 1fr;
        gap: 50px;
      }

      .form-container {
        padding: 32px 24px;
      }
    }
  </style>
  <link rel="icon" href="favicon-sam.png" type="image/png" />
  <?php include __DIR__ . '/includes/google-tag.php'; ?>
</head>

<body>

  <?php include __DIR__ . '/includes/header.php'; ?>

  <style>
    :root {
      --gray-200: #e5e7eb;
      --gray-400: #9ca3af;
      --gray-600: #4b5563;
      --gray-800: #1f2937;
    }

    .contact-page {
      background: var(--gray-50);
      color: var(--black);
      font-family: inherit;
    }

    .contact-hero {
      position: relative;
      padding: 200px 24px 240px;
      background: var(--gray-900);
      color: var(--white);
      text-align: center;
      overflow: hidden;
    }

    /* Background video - sits behind everything */
    .contact-hero-video {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.18;
      z-index: -1;
      pointer-events: none;
    }

    .contact-hero::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 800px;
      height: 800px;
      background: radial-gradient(circle, rgba(194, 213, 0, 0.6) 0%, rgba(194, 213, 0, 0.15) 40%, transparent 70%);
      filter: blur(40px);
      border-radius: 50%;
      pointer-events: none;
      z-index: 0;
    }

    .contact-hero-content {
      position: relative;
      z-index: 1;
    }

    .contact-hero h1 {
      font-size: clamp(56px, 8vw, 100px);
      font-weight: 900;
      letter-spacing: -0.03em;
      line-height: 1;
      margin-bottom: 24px;
    }

    .contact-hero p {
      font-size: clamp(18px, 2.5vw, 24px);
      color: rgba(255, 255, 255, 0.9);
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.6;
    }

    .contact-wrapper {
      max-width: 1400px;
      margin: -160px auto 120px;
      padding: 0 24px;
      position: relative;
      z-index: 2;
      display: grid;
      grid-template-columns: 1fr 1.2fr;
      gap: 40px;
    }

    @media (max-width: 1024px) {
      .contact-wrapper {
        grid-template-columns: 1fr;
      }
    }

    /* Info Cards Section */
    .contact-info-grid {
      display: flex;
      flex-direction: column;
      gap: 24px;
    }

    .info-card {
      background: var(--white);
      border: 1px solid var(--gray-200);
      border-radius: 24px;
      padding: 40px;
      display: flex;
      align-items: flex-start;
      gap: 24px;
      box-shadow: 0 24px 48px rgba(0, 0, 0, 0.03);
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      text-decoration: none;
      color: var(--black);
      position: relative;
      overflow: hidden;
    }

    .info-card::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 4px;
      background: var(--green);
      transform: scaleY(0);
      transition: transform 0.4s;
      transform-origin: bottom;
    }

    .info-card:hover {
      transform: translateX(8px);
      border-color: var(--green);
      box-shadow: 0 32px 64px rgba(194, 213, 0, 0.08);
    }

    .info-card:hover::before {
      transform: scaleY(1);
    }

    .info-icon {
      width: 64px;
      height: 64px;
      border-radius: 16px;
      background: var(--white);
      color: var(--gray-900);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      transition: all 0.4s;
    }

    .info-card:hover .info-icon {
      background: var(--green);
      color: var(--black);
      transform: scale(1.1) rotate(-5deg);
    }

    .info-text h3 {
      font-size: 22px;
      font-weight: 800;
      margin-bottom: 8px;
      color: var(--gray-900);
    }

    .info-text p {
      color: var(--gray-500);
      font-size: 16px;
      line-height: 1.6;
      margin-bottom: 12px;
    }

    .info-text strong {
      font-size: 18px;
      font-weight: 800;
      color: var(--green-dark);
      display: block;
    }

    /* Form Section */
    .contact-form-container {
      background: var(--white);
      border: 1px solid var(--gray-200);
      border-radius: 32px;
      padding: 64px;
      box-shadow: 0 32px 80px rgba(0, 0, 0, 0.04);
    }

    .contact-form-container h2 {
      font-size: 32px;
      font-weight: 900;
      margin-bottom: 8px;
      letter-spacing: -0.02em;
    }

    .contact-form-container>p {
      color: var(--gray-500);
      font-size: 16px;
      margin-bottom: 40px;
      line-height: 1.6;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      margin-bottom: 24px;
    }

    @media (max-width: 600px) {
      .form-row {
        grid-template-columns: 1fr;
      }
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 24px;
    }

    .form-group label {
      font-size: 14px;
      font-weight: 800;
      color: var(--gray-900);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      background: var(--white);
      border: 2px solid var(--gray-300);
      border-radius: 12px;
      padding: 16px 20px;
      font-size: 16px;
      color: var(--black);
      font-family: inherit;
      transition: all 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      outline: none;
      border-color: var(--green);
      background: var(--white);
      box-shadow: 0 0 0 4px rgba(194, 213, 0, 0.15);
    }

    .form-group textarea {
      resize: vertical;
      min-height: 160px;
    }

    .btn-submit {
      background: var(--green);
      color: var(--black);
      width: 100%;
      padding: 20px;
      border-radius: 12px;
      font-size: 18px;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 1px;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 16px 32px rgba(194, 213, 0, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
    }

    .btn-submit:hover {
      background: var(--green-dark);
      transform: translateY(-4px);
      box-shadow: 0 24px 48px rgba(194, 213, 0, 0.3);
    }

    /* Thank You State */
    .thankyou-overlay {
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 20px 0 10px;
      animation: fadeInUp 0.55s cubic-bezier(0.16, 1, 0.3, 1) both;
    }

    .thankyou-overlay.visible {
      display: flex;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(28px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .ty-icon-wrap {
      width: 88px;
      height: 88px;
      border-radius: 50%;
      background: var(--green);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 28px;
      box-shadow: 0 16px 40px rgba(194, 213, 0, 0.35);
      animation: popIn 0.5s 0.2s cubic-bezier(0.16, 1, 0.3, 1) both;
    }

    @keyframes popIn {
      from {
        transform: scale(0.5);
        opacity: 0;
      }

      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    .ty-icon-wrap svg {
      width: 44px;
      height: 44px;
      stroke: var(--black);
    }

    .thankyou-overlay h3 {
      font-size: 30px;
      font-weight: 900;
      letter-spacing: -0.025em;
      margin-bottom: 14px;
    }

    .thankyou-overlay .ty-sub {
      color: var(--gray-500);
      font-size: 16px;
      line-height: 1.7;
      max-width: 380px;
      margin-bottom: 32px;
    }

    .thankyou-overlay .ty-note {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: var(--green-bg);
      border: 1px solid var(--green-pale);
      color: var(--green-dark);
      border-radius: 100px;
      padding: 10px 22px;
      font-size: 14px;
      font-weight: 700;
    }

    .btn-reset {
      margin-top: 28px;
      padding: 14px 32px;
      border-radius: 10px;
      background: transparent;
      border: 2px solid var(--gray-300);
      color: var(--gray-700);
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.2s;
      font-family: inherit;
    }

    .btn-reset:hover {
      border-color: var(--green);
      color: var(--green-dark);
    }
  </style>

  <main class="contact-page">
    <section class="contact-hero reveal">
      <!-- Background video -->
      <video class="contact-hero-video" autoplay muted loop playsinline aria-hidden="true">
        <source src="https://pub-ce72dd6475514908a6d97cfa33c7af95.r2.dev/sam%20technology%202.0.mp4" type="video/mp4" />
      </video>
      <div class="contact-hero-content">
        <div
          style="display: inline-block; background: rgba(255,255,255,0.1); color: var(--green); padding: 8px 24px; border-radius: 100px; font-weight: 800; font-size: 14px; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 24px; backdrop-filter: blur(10px);">
          We are here for you</div>
        <h1>Let's Talk.</h1>
        <p>Whether you need tech support, sales inquiries, or general information, the sam&reg; team is ready to assist
          you.</p>
      </div>
    </section>

    <div class="contact-wrapper reveal" style="transition-delay: 0.2s;">

      <div class="contact-info-grid">
        <a href="tel:8882029831" class="info-card">
          <div class="info-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
            </svg>
          </div>
          <div class="info-text">
            <h3>Phone &amp; Fax</h3>
            <p>Call or fax us toll-free. Our support team is available during standard business hours.</p>
            <strong>(888) 202-9831</strong>
          </div>
        </a>

        <a href="mailto:help@samrecover.com" class="info-card">
          <div class="info-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
            </svg>
          </div>
          <div class="info-text">
            <h3>Medical Support</h3>
            <p>For patients and healthcare providers needing technical or treatment assistance.</p>
            <strong>help@samrecover.com</strong>
          </div>
        </a>

        <a href="mailto:info@samrecover.com" class="info-card">
          <div class="info-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 16v-4" />
              <path d="M12 8h.01" />
            </svg>
          </div>
          <div class="info-text">
            <h3>General Info</h3>
            <p>For corporate inquiries, sales, press, or general information about ZetrOZ Systems.</p>
            <strong>info@samrecover.com</strong>
          </div>
        </a>

        <div class="info-card" style="cursor: default;">
          <div class="info-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
              <circle cx="12" cy="10" r="3" />
            </svg>
          </div>
          <div class="info-text">
            <h3>Headquarters</h3>
            <p>sam&reg; family of ultrasound products are designed and manufactured by:</p>
            <strong>ZetrOZ Systems, LLC</strong>
          </div>
        </div>
      </div>

      <div class="contact-form-container" id="contact-form">
        <h2>Send a Message</h2>
        <p>Fill out the form below and a representative will get back to you shortly.</p>

        <form action="submit-enquiry.php" method="POST" data-enquiry-form="true" id="contact-form">
          <input type="hidden" name="redirect_to" value="contact-us.php">
          <input type="hidden" name="form_source" value="contact-us.php">
          <input type="text" name="website" value="" tabindex="-1" autocomplete="off" style="display:none">
          <div class="form-row">
            <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" id="fname" name="fname" placeholder="Jane" required>
            </div>
            <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" id="lname" name="lname" placeholder="Doe" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="jane@example.com" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="tel" id="phone" name="phone" placeholder="(555) 123-4567">
            </div>
          </div>

          <div class="form-group">
            <label for="inquiry">Inquiry Type</label>
            <select id="inquiry" name="inquiry">
              <option value="patient">I am a Patient</option>
              <option value="provider">I am a Healthcare Provider</option>
              <option value="sales">Sales Inquiry</option>
              <option value="support">Technical Support</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div class="form-group">
            <label for="message">Your Message</label>
            <textarea id="message" name="message" placeholder="How can we help you today?" required></textarea>
          </div>

          <button type="submit" class="btn-submit" id="contactSubmitBtn">
            Send Message
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <line x1="22" y1="2" x2="11" y2="13" />
              <polygon points="22 2 15 22 11 13 2 9 22 2" />
            </svg>
          </button>
        </form>

        <!-- Thank You Message -->
        <div class="thankyou-overlay" id="thankyouOverlay" role="alert" aria-live="polite">
          <div class="ty-icon-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
              stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12" />
            </svg>
          </div>
          <h3>Thank You!</h3>
          <p class="ty-sub">Your message has been received. We appreciate you reaching out to us.</p>
          <div class="ty-note">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 8v4l3 3" />
            </svg>
            Our team will contact you within 1-2 business days.
          </div>
          <button class="btn-reset" id="resetFormBtn" onclick="resetContactForm()">Send Another Message</button>
        </div>
      </div>

    </div>
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

    function resetContactForm() {
      const contactForm = document.querySelector('.contact-form-container form');
      const thankyouOverlay = document.getElementById('thankyouOverlay');
      if (contactForm) {
        contactForm.reset();
        contactForm.style.display = 'block';
      }
      if (thankyouOverlay) {
        thankyouOverlay.classList.remove('visible');
      }
    }
  </script>
  <script src="assets/header-config.js?v=20260911-1"></script>
</body>

</html>
