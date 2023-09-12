import { component$, useStore } from "@builder.io/qwik";
import { NavItem } from "~/domain/nav-item";

export const NavItemComponent = component$(
  () => {
    const navigationItems = useStore<NavItem[]>(() => {
      return [
        {
          title: "Home",
          leadingIcon: "bi-grid",
          url: "/",
        },
        {
          title: "Profile",
          leadingIcon: "bi-person-fill",
          url: "/dashboard/profile",
        },
        {
          title: "How to Apply",
          leadingIcon: "bi-info-circle-fill",
          url: "/dashboard/info-apply",
        },
        {
          title: "Notifications",
          leadingIcon: "bi-bell",
          children: [
            { title: "Interest Rate Responses", url: "/dashboard/notifications/interest-rate-responses" },
            { title: "Tour Interest Responses", url: "/dashboard/notifications/tourism-interest-responses" },
          ],
        },
        {
          title: "Credit Offers",
          leadingIcon: "bi-bank2",
          children: [
            { title: "Marketplace Credit Offers", url: "/dashboard/credit-offers/marketplace-credit-offers" },
            { title: "My Applications", url: "/dashboard/credit-offers/my-applications" },
            { title: "My Approved Credit Offers", url: "/dashboard/credit-offers/my-approved-credit-offers" },
          ],
        },
        {
          title: "Loan Applications",
          leadingIcon: "bi-credit-card-fill",
          children: [
            { title: "Apply for a Loan/Credit", url: "/dashboard/loan-applications/apply" },
            { title: "My Loan Applications", url: "/dashboard/loan-applications/my-loan-applications" },
            { title: "My Approved Loans", url: "/dashboard/loan-applications/my-approved-loans" },
          ],
        },
        {
          title: "Domestic Tourism",
          leadingIcon: "bi-globe",
          children: [
            { title: "Domestic Tourism Offers", url: "/dashboard/domestic-tourism/domestic-tourism-offers" },
            { title: "My Tour & Safari Applications", url: "/dashboard/domestic-tourism/tour-safari-applications" },
            { title: "Approved Tours & Safaris", url: "/dashboard/domestic-tourism/approved-tours-safaris" },
          ],
        },
      ];
    });
    return (
      <ul class="sidebar-nav" id="sidebar-nav">
        {navigationItems.map((item, index) => (
          <li key={index} class="nav-item">
            <a
              class={`nav-link collapsed`}
              data-bs-target={item.children ? `#${item.title.replace(/\s+/g, '').toLowerCase()}-nav` : ''}
              data-bs-toggle={item.children ? 'collapse' : ''}
              href={item.url}
            >
              <i class={`bi ${item.leadingIcon}`}></i>
              <span>{item.title}</span>
              {item.children && <i class="bi bi-chevron-down ms-auto"></i>}
            </a>
            {item.children && (
              <ul
                id={`${item.title.replace(/\s+/g, '').toLowerCase()}-nav`}
                class="nav-content collapse"
                data-bs-parent="#sidebar-nav"
              >
                {item.children.map((child, childIndex) => (
                  <li key={childIndex}>
                    <a href={child.url}>
                      <i class={`bi bi-circle`}></i>
                      <span>{child.title}</span>
                    </a>
                  </li>
                ))}
              </ul>
            )}

          </li>
        ))}
      </ul>
    );
  })
