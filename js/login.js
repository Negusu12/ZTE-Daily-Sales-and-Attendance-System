const themes = [
    {
        background: "#00BFFE",
        color: "#FFFFFF",
        primaryColor: "#4D7DBF"
    },
    {
        background: "#414142",
        color: "#FFFFFF",
        primaryColor: "#03949B"
    },
    {
        background: "#B2B435",
        color: "#FFFFFF",
        primaryColor: "#4D7DBF"
    },
    {
        background: "#26225B",
        color: "#FFFFFF",
        primaryColor: "#03949B"
    },
    {
        background: "#4D7DBF",
        color: "#000000",
        primaryColor: "#414142"
    },
    {
        background: "#B2B435",
        color: "#FFF",
        primaryColor: "#26225B"
    }
];

const setTheme = (theme) => {
    const root = document.querySelector(":root");
    root.style.setProperty("--background", theme.background);
    root.style.setProperty("--color", theme.color);
    root.style.setProperty("--primary-color", theme.primaryColor);
    root.style.setProperty("--glass-color", theme.glassColor);
};

const displayThemeButtons = () => {
    const btnContainer = document.querySelector(".theme-btn-container");
    themes.forEach((theme) => {
        const div = document.createElement("div");
        div.className = "theme-btn";
        div.style.cssText = `background: ${theme.background}; width: 25px; height: 25px`;
        btnContainer.appendChild(div);
        div.addEventListener("click", () => setTheme(theme));
    });
};

displayThemeButtons();

/*---------------------------text validation only accept text-------------------------------------*/
function lettersOnly(input) {
    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex, "");
}

/*---------------------------text validation only accept text END-------------------------------------*/

