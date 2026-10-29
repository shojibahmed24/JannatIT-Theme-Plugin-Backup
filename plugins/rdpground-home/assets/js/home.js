/* RDPGround Home — menu, pricing tabs, domain chips and hero animation. No dependencies. */
(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Header background on scroll
  const header = document.querySelector('.site-header');
  const onScroll = () => header.classList.toggle('scrolled', scrollY > 8);
  onScroll();
  addEventListener('scroll', onScroll, { passive: true });

  // Mobile menu
  const toggle = document.querySelector('.nav-toggle');
  const mnav = document.getElementById('mobile-nav');
  const setNav = open => {
    toggle.setAttribute('aria-expanded', open);
    toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    mnav.hidden = !open;
    document.body.classList.toggle('nav-open', open);
  };
  toggle.addEventListener('click', () => setNav(toggle.getAttribute('aria-expanded') !== 'true'));
  mnav.addEventListener('click', e => { if (e.target.closest('a')) setNav(false); });
  matchMedia('(min-width: 1041px)').addEventListener('change', e => { if (e.matches) setNav(false); });

  // Desktop dropdown (click/keyboard support; hover handled in CSS)
  document.querySelectorAll('.has-menu > button').forEach(btn => {
    btn.addEventListener('click', () => btn.setAttribute('aria-expanded', btn.parentElement.classList.toggle('open')));
  });
  document.addEventListener('click', e => {
    document.querySelectorAll('.has-menu.open').forEach(li => {
      if (!li.contains(e.target)) { li.classList.remove('open'); li.querySelector('button').setAttribute('aria-expanded', 'false'); }
    });
  });

  // Pricing tabs
  const tabs = [...document.querySelectorAll('#pricing [role="tab"]')];
  const selectTab = tab => tabs.forEach(t => {
    const on = t === tab;
    t.setAttribute('aria-selected', on);
    t.tabIndex = on ? 0 : -1;
    document.getElementById(t.getAttribute('aria-controls')).hidden = !on;
  });
  tabs.forEach((t, i) => {
    t.addEventListener('click', () => selectTab(t));
    t.addEventListener('keydown', e => {
      const map = { ArrowRight: i + 1, ArrowLeft: i - 1, Home: 0, End: tabs.length - 1 };
      if (!(e.key in map)) return;
      e.preventDefault();
      const next = tabs[(map[e.key] + tabs.length) % tabs.length];
      selectTab(next);
      next.focus();
    });
  });
  document.querySelectorAll('[data-plan-tab]').forEach(a => a.addEventListener('click', () => {
    const t = document.getElementById('tab-' + a.dataset.planTab);
    if (t) selectTab(t);
  }));

  // Domain extension chips
  const dq = document.getElementById('domain-q');
  if (dq) document.querySelectorAll('.tlds button').forEach(b => b.addEventListener('click', () => {
    const name = dq.value.trim().replace(/\..*$/, '') || 'yourbusiness';
    dq.value = name + b.textContent;
    dq.focus();
  }));

  // Stats count-up
  const counters = document.querySelectorAll('[data-count]');
  if (!reduce && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver(entries => entries.forEach(en => {
      if (!en.isIntersecting) return;
      io.unobserve(en.target);
      const el = en.target, target = +el.dataset.count, t0 = performance.now();
      const tick = now => {
        const p = Math.min(1, (now - t0) / 1400);
        el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3))).toLocaleString('en-US');
        if (p < 1) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
    }), { threshold: 0.5 });
    counters.forEach(c => io.observe(c));
  }

  // Hero: live CPU sparkline + memory bar
  const line = document.getElementById('spark-line');
  const area = document.getElementById('spark-area');
  const cpuVal = document.getElementById('cpu-val');
  const ramVal = document.getElementById('ram-val');
  const ramBar = document.getElementById('ram-bar');
  const W = 240, H = 46, MAX = 70;
  if (!line || !area) return;
  let pts = Array.from({ length: 34 }, (_, i) => 16 + Math.sin(i / 2.6) * 7 + Math.random() * 7);
  const draw = () => {
    const step = W / (pts.length - 1);
    const d = pts.map((v, i) => (i ? 'L' : 'M') + (i * step).toFixed(1) + ' ' + (H - (v / MAX) * H).toFixed(1)).join(' ');
    line.setAttribute('d', d);
    area.setAttribute('d', d + ` L${W} ${H} L0 ${H} Z`);
    cpuVal.textContent = Math.round(pts[pts.length - 1]);
  };
  draw();
  if (!reduce) {
    let ram = 1.6;
    setInterval(() => {
      const last = pts[pts.length - 1];
      pts.push(Math.max(5, Math.min(58, last + (Math.random() - 0.48) * 14)));
      pts.shift();
      draw();
      ram = Math.max(1.3, Math.min(2.4, ram + (Math.random() - 0.5) * 0.2));
      ramVal.textContent = ram.toFixed(1);
      ramBar.style.width = (ram / 4 * 100).toFixed(0) + '%';
    }, 1100);
  }

})();
