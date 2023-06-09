/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./public/**/*.{html,js,php}",
        "*.{html,js,php}",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                morado: "#8C30F5",
                rosado: "#F1E4FF",
                lineaRosado: "#F22BB2",
            },
            backgroundImage: {
                fondo: 'url("../src/img/casa1.png")',
                fondomain: 'url("../src/img/grupo.png")',
                fondoRegistro: 'url("../src/img/fondoRegistro.png")',
                fondo2: 'url("../src/img/fondo3.png")',
                bienescompartidosBL:'url("../src/img/icons/bienescompartidosBL.svg")',
                bienescompartidosCL:'url("../src/img/icons/bienescompartidosCL.svg")',
                fondoIndex: 'url("../src/img/Desktop.png")',
                fondoIndexabajo: 'url("../src/img/fondo4.png")',
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms")
    ],
};
