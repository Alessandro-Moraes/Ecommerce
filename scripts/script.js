// DARK THEME
const html = document.querySelector("html")
const checkbox = document.querySelector("input[name=theme]")

const getStyle = (element, style) =>
    window
    .getComputedStyle(element)
    .getPropertyValue(style)

const initialColors = {
    bg: getStyle(html, "--bg"),
    bgPanel: getStyle(html, "--bg-panel"),
    bgInput: getStyle(html, "--bg-input"),
    colorHeadings: getStyle(html, "--color-headings"),
    colorText: getStyle(html, "--color-text"),
    colorButton: getStyle(html, "--color-button"),
    colorButtonHover: getStyle(html, "--color-button-hover"),
}

const darkMode = {
    bg: "#333333",
    bgPanel: "#434343",
    bgInput: "#B5B5B5",
    colorHeadings: "#3664FF",
    colorText: "#FCFCFC",
    colorButton: "#B5B5B5",
    colorButtonHover: "#B5B5B5",
}

const transformKey = key =>
    "--" + key.replace(/([A-Z])/, "-$1").toLowerCase()


const changeColors = (colors) => {
    Object.keys(colors).map(key =>
        html.style.setProperty(transformKey(key), colors[key])
    )
}

var tema = JSON.parse(localStorage.getItem('Theme'))

function Clicar() {
    checkbox.addEventListener("change", ({ target }) => {
        target.checked ? changeColors(darkMode) : changeColors(initialColors)

        localStorage.setItem('Theme', JSON.stringify(target.checked))
    });
}
Clicar()

if (tema == true) {
    changeColors(darkMode) 
    checkbox.checked = true 
}

// FINAL DARK THEME

var inputLogin = document.getElementById('login');
var inputSenha = document.getElementById('senha');


function Limpar() {
    inputLogin.value = '';
    inputSenha.value = '';
}

clear.addEventListener('click', Limpar)

(function error() {
    setTimeout(()=>{
        const erro = document.getElementById('span');
        if (erro) {
            erro.remove();
        }
    }, 2000)   
})()
