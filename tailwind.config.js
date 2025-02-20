import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            sm: "640px",
            md: "1024px", // 768 + 256
            lg: "1280px", // 1024 + 256
            xl: "1536px", // 1280 + 256
        },
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                pine: {
                    50: "#F8FBF5",
                    100: "#F0F7EA",
                    200: "#DAEBCB",
                    300: "#C4DEAC",
                    400: "#97C66D",
                    500: "#6BAD2F",
                    600: "#609C2A",
                    700: "#40681C",
                    800: "#304E15",
                    900: "#20340E",
                },
            },
        },
    },
};
