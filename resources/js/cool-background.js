//by @nodws
/*
Using trianglify.js and d3.js library
Also not possible without Tim Berners Lee creator of the www, Brendan Eich creator of javascript, Michael S. Dell founder of Dell Computer who manufactured my PC, my Mom and Dad who manufactured me and The BigBang creator of the universe.
Hope these credits are enough to satisfy snotty commentators
*/
//Click to change bg
window.onload = () => {
    var rn = Math.floor((Math.random() * 150) + 60);
    var rs = Math.floor((Math.random() * 100) + 1);
    if (rs == 1) {
        var t = new Trianglify({
            x_gradient: Trianglify.colorbrewer.BlWi[6],
            noiseIntensity: 0,
            cellsize: rn
        });
        var pattern = t.generate(window.innerWidth, window.innerWidth + 200);
        document.body.setAttribute('style', 'background-image: ' + pattern.dataUrl);
    } else if (getCookie('mode') === 'light') {
        var t = new Trianglify({
            x_gradient: Trianglify.colorbrewer.BlWi[4],
            noiseIntensity: 0,
            cellsize: rn
        });
        var pattern = t.generate(window.innerWidth, window.innerWidth + 200);
        document.body.setAttribute('style', 'background-image: ' + pattern.dataUrl);
    } else if (getCookie('mode') === 'ugly') {
        var t = new Trianglify({
            x_gradient: Trianglify.colorbrewer.BlWi[5],
            noiseIntensity: 0,
            cellsize: rn
        });
        var pattern = t.generate(window.innerWidth, window.innerWidth + 200);
        document.body.setAttribute('style', 'background-image: ' + pattern.dataUrl);
    } else {
        var t = new Trianglify({
            x_gradient: Trianglify.colorbrewer.BlWi[3],
            noiseIntensity: 0,
            cellsize: rn
        });
        var pattern = t.generate(window.innerWidth, window.innerWidth + 200);
        document.body.setAttribute('style', 'background-image: ' + pattern.dataUrl);
    }
}
