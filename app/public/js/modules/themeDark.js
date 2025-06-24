function themeDark() {
	let currentTheme = localStorage.theme ?? "light";

	const themeSwitch = document.querySelector("#theme-mode");

	applyTheme();

	themeSwitch?.addEventListener("click", function () {
		currentTheme = (currentTheme === "light") ? "dark" : "light";
		localStorage.theme = currentTheme;
		applyTheme();
	});

	function applyTheme() {
		const iconTheme = `images/sprites.svg#${currentTheme}`;
		const useElement = themeSwitch?.querySelector("use");

		if (useElement) {
			useElement.setAttribute("href", iconTheme);
		}

		const CSSFile = (currentTheme === "light") ? "styles" : "styles-dark";
		const linkStyle = document.querySelector("#style");

		if (linkStyle) {
			linkStyle.href = `css/${CSSFile}.css`;
		}

		document.documentElement.setAttribute("data-theme", currentTheme); // facultatif mais utile
	}
}

themeDark();
