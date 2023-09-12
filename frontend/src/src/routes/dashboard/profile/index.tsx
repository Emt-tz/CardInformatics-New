import { component$ } from "@builder.io/qwik";
import { routeAction$, zod$, z, server$, routeLoader$ } from "@builder.io/qwik-city";
import { PrismaClient } from "@prisma/client";
import { ProfileCard, ProfileChangePassword, ProfileEdit, ProfileOverview, ProfileSettings } from "~/components/profile/profile-card";

export const useLoadProfileDetails = routeLoader$(async () => {
    const prisma = new PrismaClient();
    try {
        const userDetails = await prisma.registration.findUnique({
            where: { id: 2 },
        });
        return userDetails;
    } catch (error) {
        return error;
    }
});


export const useChangePassword = server$(async (data) => {
    const prisma = new PrismaClient();
    const { id, currentPassword, password } = data;

    try {
        // You can add logic to validate the current password before updating
        const user = await prisma.registration.findUnique({ where: { id } });

        if (!user) {
            return { error: "User not found" }
        }

        // Check if the current password matches
        if (user.password !== currentPassword) {
            return { error: "Current password is incorrect" }
        }

        // Update the user's password
        const updatedUser = await prisma.registration.update({
            where: { id },
            data: { password },
        });

        return { success: "Password updated successfully" };
    } catch (error) {
        return { error: "Failed to update password" }
    }
});


export default component$(() => {
    return <>
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Profile</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>{/* End Page Title */}

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <ProfileCard />
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            {/* Bordered Tabs */}
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                {/* <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                </li> */}

                                {/* <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                                </li> */}

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">
                                <ProfileOverview />
                                {/* <ProfileEdit /> */}
                                {/* <ProfileSettings /> */}
                                <ProfileChangePassword />
                            </div>
                            {/* End Bordered Tabs */}

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </>
})