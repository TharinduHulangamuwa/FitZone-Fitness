// Dropdown Animation for Navigation Menu
document.addEventListener("DOMContentLoaded", () => {
    const dropdowns = document.querySelectorAll(".dropdown");

    dropdowns.forEach((dropdown) => {
        const dropdownContent = dropdown.querySelector(".dropdown-content");
        dropdown.addEventListener("mouseover", () => {
            dropdownContent.style.opacity = "1";
            dropdownContent.style.transform = "translateY(0)";
            dropdownContent.style.pointerEvents = "auto";
        });
        dropdown.addEventListener("mouseout", () => {
            dropdownContent.style.opacity = "0";
            dropdownContent.style.transform = "translateY(-10px)";
            dropdownContent.style.pointerEvents = "none";
        });
    });
});

// Smooth Scroll for Links
document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll("a[href^='#'], a[href^='./'], a[href^='/']");

    links.forEach((link) => {
        link.addEventListener("click", (e) => {
            const targetId = link.getAttribute("href").split("#")[1];
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                e.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: "smooth",
                });
            }
        });
    });
});

// Animated Scroll-to-Top Button
const createScrollToTopButton = () => {
    const button = document.createElement("button");
    button.textContent = "↑";
    button.style.cssText =
        "position: fixed; bottom: 20px; right: 20px; background-color: #4dabf7; color: #fff; border: none; border-radius: 50%; width: 50px; height: 50px; display: none; justify-content: center; align-items: center; font-size: 20px; cursor: pointer; transition: transform 0.3s; z-index: 1000;";

    button.addEventListener("mouseover", () => {
        button.style.transform = "scale(1.2)";
    });

    button.addEventListener("mouseout", () => {
        button.style.transform = "scale(1)";
    });

    button.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    document.body.appendChild(button);

    window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
            button.style.display = "flex";
        } else {
            button.style.display = "none";
        }
    });
};

document.addEventListener("DOMContentLoaded", createScrollToTopButton);
