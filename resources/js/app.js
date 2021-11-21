require('./bootstrap')

Alpine.start()

/* Progress bar */
// Source: https://alligator.io/js/progress-bar-javascript-css-variables/
const h = document.documentElement,
    b = document.body,
    st = 'scrollTop',
    sh = 'scrollHeight',
    progress = document.querySelector('#progress')

document.addEventListener('scroll', function () {
    /*Refresh scroll % width*/
    const scroll =
        ((h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight)) * 100
    progress.style.setProperty('--scroll', scroll + '%')
})
