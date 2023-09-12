import { component$ } from "@builder.io/qwik";
import { NavItemComponent } from "./nav-items";

export const SideBar = component$(() => {
    return (
        <>
            {/* <!-- ======= Sidebar ======= --> */}
            <aside id="sidebar" class="sidebar">
                <NavItemComponent />
            </aside>
            {/* <!-- End Sidebar--> */}

        </>
    );
})