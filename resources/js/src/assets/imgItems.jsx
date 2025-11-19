
export const heroImages = import.meta.glob("../assets/heroes/*.png", {
    eager: true,
    import: "default",
});
export const playerImages = import.meta.glob("../assets/players/*.png", {
    eager: true,
    import: "default",
});

export function getHeroImage(heroName) {
    const fileName = heroName.replace(/\s+/g, "") + ".png";
    return (
        heroImages[`../assets/heroes/${fileName}`] ||
        heroImages["../assets/heroes/default.png"]
    );
}

export function getPlayerImage(playerName) {
    const fileName = playerName.replace(/\s+/g, "") + ".png";
    return (
        playerImages[`../assets/players/${fileName}`] ||
        playerImages["../assets/players/default.png"]
    );
}