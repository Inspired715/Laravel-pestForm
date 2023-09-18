/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    gray: {
                        DEFAULT: "#F3F5F8",
                    },
                    primary: {
                        100: "#4DEABD",
                        200: "#07E6A6",
                        300: "#05B3B1",
                        400: "#047756",
                        500: "#226653",
                    },
                    blue: {
                        50: "#F4F7FB",
                        100: "#4D6E95",
                        200: "#143154",
                    },
                },
            },
            backgroundImage: {
                "hero-bg": "url('./images/screen-pattern-gray.svg')",
            },
        },
    },
    plugins: [],
};
