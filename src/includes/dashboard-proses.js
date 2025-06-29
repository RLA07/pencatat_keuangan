document.addEventListener("click", function (event) {
  const kebabButtons = document.querySelectorAll(".kebab-button");
  const tooltipTriggers = document.querySelectorAll(".tooltip-trigger");

  const openDropdowns = document.querySelectorAll(".action-dropdown");
  const openTooltips = document.querySelectorAll(".tooltip-popup");

  let isClickInsidePopup = false;
  let clickedPopupId = null;

  let isKebabClick = Array.from(kebabButtons).some((button) =>
    button.contains(event.target)
  );
  let isTooltipClick = Array.from(tooltipTriggers).some((trigger) =>
    trigger.contains(event.target)
  );

  openDropdowns.forEach((dropdown) => {
    if (
      !isKebabClick ||
      dropdown.id !==
        "dropdown-" + event.target.closest(".kebab-button")?.dataset.id
    ) {
      dropdown.style.display = "none";
    }
  });
  openTooltips.forEach((tooltip) => {
    if (
      !isTooltipClick ||
      tooltip.id !==
        "tooltip-" + event.target.closest(".tooltip-trigger")?.dataset.tooltipId
    ) {
      tooltip.style.display = "none";
    }
  });

  if (isKebabClick) {
    const button = event.target.closest(".kebab-button");
    const dropdown = document.getElementById("dropdown-" + button.dataset.id);
    if (dropdown) {
      dropdown.style.display =
        dropdown.style.display === "block" ? "none" : "block";
    }
  }

  if (isTooltipClick) {
    const trigger = event.target.closest(".tooltip-trigger");
    const tooltip = document.getElementById(
      "tooltip-" + trigger.dataset.tooltipId
    );
    if (tooltip) {
      tooltip.style.display =
        tooltip.style.display === "block" ? "none" : "block";
    }
  }
});
