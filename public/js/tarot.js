(function () {
    var cards = window.TAROT_CARDS || [];
    var deck = document.getElementById('deck');
    if (!deck || cards.length < 3) return;

    var buttons = Array.prototype.slice.call(deck.querySelectorAll('.tcard'));
    var hint = document.getElementById('drawHint');
    var reading = document.getElementById('reading');
    var title = document.getElementById('rTitle');
    var kw = document.getElementById('rKw');
    var text = document.getElementById('rText');
    var assigned = [];

    function shuffle(arr) {
        var a = arr.slice();
        for (var i = a.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var t = a[i]; a[i] = a[j]; a[j] = t;
        }
        return a;
    }

    function deal() {
        var picks = shuffle(cards).slice(0, 3);
        assigned = picks.map(function (c) { return { card: c, reversed: Math.random() < 0.3 }; });
        buttons.forEach(function (btn, i) {
            var a = assigned[i];
            btn.disabled = false;
            btn.classList.remove('is-flipped', 'is-dim');
            btn.setAttribute('aria-label', 'Kartu ' + (i + 1) + ', belum dibuka');
            btn.querySelector('.tcard-num').textContent = a.card.number;
            btn.querySelector('.tcard-name').textContent = a.card.name;
            btn.querySelector('.tcard-front').classList.toggle('is-reversed', a.reversed);
        });
        reading.hidden = true;
        hint.hidden = false;
    }

    buttons.forEach(function (btn, i) {
        btn.addEventListener('click', function () {
            var a = assigned[i];
            buttons.forEach(function (b, k) {
                b.disabled = true;
                if (k !== i) b.classList.add('is-dim');
            });
            btn.classList.add('is-flipped');
            btn.setAttribute('aria-label', a.card.name + (a.reversed ? ', terbalik' : ''));
            title.textContent = a.card.name + (a.reversed ? ' (terbalik)' : '');
            kw.textContent = a.card.keywords;
            text.textContent = a.reversed ? a.card.reversed : a.card.upright;
            hint.hidden = true;
            reading.hidden = false;
        });
    });

    document.getElementById('reset').addEventListener('click', deal);
    deal();
})();
