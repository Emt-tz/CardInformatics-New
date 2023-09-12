import { component$, useStore } from "@builder.io/qwik";
import { time } from "console";
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