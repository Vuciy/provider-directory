describe("Providers Page UI", () => {
    beforeEach(() => {
        cy.visit("/providers");
    });

    it("shows the header", () => {
        cy.get("header").should("exist");
    });

    it("displays categories list", () => {
        cy.get("[data-cy=categories-list]").should("be.visible");
    });

    it("loads providers", () => {
        cy.get("[data-cy=provider-card]").should("have.length.greaterThan", 0);
    });

    it("filters providers by category", () => {
        cy.get("[data-cy=category-item]").first().click();

        cy.get("[data-cy=provider-card]").should("have.length.greaterThan", 0);
    });

    it("drawer opens on mobile", () => {
        cy.viewport("iphone-11"); // simulate mobile
        cy.get("[data-cy=open-drawer]").click();
        cy.get("[data-cy=categories-list]").should("be.visible");
    });
});
