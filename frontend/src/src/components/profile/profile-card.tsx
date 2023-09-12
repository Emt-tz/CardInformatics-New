import { component$, useStore, $, } from "@builder.io/qwik";

// Generate the user ID prefix using pure JavaScript
const currentDate = new Date();
const year = currentDate.getFullYear().toString().substr(-2); // Get last two digits of the year
const month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Get month with leading zero if needed
const user_id_prefix = "CI" + year + month;


export const ProfileCard = component$(() => {
    //const details: any = useLoadProfileDetails()

    return (
        <>
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    {/* <img src={`${details.value.profile_pic}` ?? "/img/profile-img.jpg"} alt="Profile" class="rounded-circle" /> */}
                    {/* <h2>{`${details.value.f_name ?? ""} ${details.value.l_name}`}</h2> */}
                    <h3>ID: {`${user_id_prefix}`}</h3>
                    {/* <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div> */}
                </div>
            </div>
        </>
    )
})

export const ProfileOverview = component$(() => {
   // const details: any = useLoadProfileDetails()
    return (
        <>
            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                 {/* <div class="col-lg-9 col-md-8">{`${details.value.f_name} ${details.value.l_name}`}</div> */}
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender</div>
                    {/* <div class="col-lg-9 col-md-8">{details.value.gender}</div> */}
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    {/* <div class="col-lg-9 col-md-8">{details.value.citizenship}</div> */}
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    {/* <div class="col-lg-9 col-md-8">{details.value.address}</div> */}
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    {/* <div class="col-lg-9 col-md-8">{details.value.p_number}</div> */}
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    {/* <div class="col-lg-9 col-md-8">{details.value.email}</div> */}
                </div>

            </div>
        </>
    )
})

export const ProfileEdit = component$(() => {
    return (
        <>
            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                {/* Profile Edit Form */}
                <form>
                    <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                            <img src="/img/profile-img.jpg" alt="Profile" />
                            <div class="pt-2">
                                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                        <div class="col-md-8 col-lg-9">
                            <textarea name="about" class="form-control" id="about" style="height: 100px" value={`Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.`}></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="job" type="text" class="form-control" id="Job" value="Web Designer" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="country" type="text" class="form-control" id="Country" value="USA" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#" />
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
                {/* End Profile Edit Form */}
            </div>
        </>
    )
})

export const ProfileSettings = component$(() => {
    return (
        <>

            <div class="tab-pane fade pt-3" id="profile-settings">

                {/* Settings Form */}
                <form>

                    <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                        <div class="col-md-8 col-lg-9">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="changesMade" checked />
                                <label class="form-check-label" for="changesMade">
                                    Changes made to your account
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newProducts" checked />
                                <label class="form-check-label" for="newProducts">
                                    Information on new products and services
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="proOffers" />
                                <label class="form-check-label" for="proOffers">
                                    Marketing and promo offers
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled />
                                <label class="form-check-label" for="securityNotify">
                                    Security alerts
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>{/* End settings Form */}

            </div>
        </>
    )
})
export const ProfileChangePassword = component$(() => {
    const data = useStore({
        currentPassword: "",
        newPassword: "",
        confirmNewPassword: "",
        loading: false,
        response: "",
        error: "",
    });

    const handleChangePassword = $(async () => {
        data.loading = true;

        try {
            if (data.newPassword === data.confirmNewPassword) {
                if (data.currentPassword && data.newPassword) {
                    // const response = await useChangePassword({
                    //     id: 2,
                    //     currentPassword: data.currentPassword,
                    //     password: data.newPassword,
                    // });
                    // if (response.error) {
                    //     data.response = "" // Set the response from the server
                    //     data.error = `${response.error}`; // Clear any previous error message
                    //     setTimeout(() => {
                    //         data.response = "";
                    //     }, 5000);
                    // } else {
                    //     data.response = `${response.success}`; // Set the response from the server
                    //     data.error = ""; // Clear any previous error message
                    //     console.log(response);
                    //     setTimeout(() => {
                    //         data.response = "";
                    //     }, 5000);
                    // }
                } else {
                    data.error = "Current and new passwords are required.";
                    data.response = "";
                    setTimeout(() => {
                        data.error = "";
                    }, 5000); // Clear response after 5 seconds
                }
            } else {
                data.response = "";
                data.error = `New password does not match with Cornfirm new password`;
                setTimeout(() => {
                    data.error = "";
                }, 5000); // Clear response after 5 seconds
            }
        } catch (error) {
            data.error = 'Password change error:', error;
            data.response = ""; // Clear any previous response

            setTimeout(() => {
                data.error = "";
            }, 5000); // Clear error after 5 seconds
        } finally {
            data.loading = false;
        }
    });

    return (
        <>
            <div class="tab-pane fade pt-3" id="profile-change-password">
                {/* Change Password Form */}
                <form>
                    <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="password" type="password" class="form-control" id="currentPassword" onChange$={
                                (e) =>
                                    data.currentPassword = e.target.value
                            } />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="newpassword" type="password" class="form-control" id="newPassword" onChange$={
                                (e) =>
                                    data.newPassword = e.target.value
                            } />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="renewpassword" type="password" class="form-control" id="renewPassword"
                                onChange$={
                                    (e) =>
                                        data.confirmNewPassword = e.target.value
                                } />
                        </div>
                    </div>
                    <div class="text-center">
                        {(data.response || data.error) && (
                            <Alert data />
                        )}
                        <button
                            type="button"
                            class="btn btn-primary"
                            onClick$={handleChangePassword}
                            disabled={data.loading}
                        >
                            {data.loading ? 'Processing...' : 'Change Password'}
                        </button>
                    </div>
                </form>
                {/* End Change Password Form */}
            </div>
        </>
    )
})

export const Alert = component$(({data}:any) => {
    return (
        <>
            <div
                class={`alert ${data.error ? 'alert-danger' : 'alert-success'
                    } alert-dismissible fade show`}
                role="alert"
            >
                {data.error ? data.error : data.response}
            </div>
        </>
    )
})