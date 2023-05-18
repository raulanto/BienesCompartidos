/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./public/**/*.{html,js,php}"],
    theme: {
        extend: {
            colors: {
                morado: "#8C30F5",
                rosado: "#F1E4FF",
                lineaRosado:"#F22BB2",
            },
            backgroundImage: {
              'fondo':'url("../src/img/fondo.png")',
              'fondomain':'url("../src/img/grupo.png")',
              'fondoRegistro':'url("../src/img/fondoRegistro.png")',
              'fondo2':'url("../src/img/fondo3.png")',
              'bienescompartidosBL':'url("../src/img/icons/bienescompartidosBL.svg")',
              'bienescompartidosCL':'url("../src/img/icons/bienescompartidosCL.svg")',
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        // ...
    ],
};
