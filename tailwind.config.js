/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}",
            "./src/public/*.{html,js}"  ],
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
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        // ...
    ],
};
