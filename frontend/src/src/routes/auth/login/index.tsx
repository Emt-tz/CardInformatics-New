import { component$, useStore, $, useVisibleTask$ } from "@builder.io/qwik";
import { useLocation } from "@builder.io/qwik-city";
import { Alert } from "~/components/profile/profile-card";
import { useAuthSignin } from "~/routes/plugin@auth";

export const Login = component$(() => {
    const loginAction = useAuthSignin();
    const loc = useLocation()
    const data = useStore({
        username: "",
        password: "",
        error: ""
    })
    const handleLogin = $(async (e: any) => {
        console.log(e);
        try {
            const response = await loginAction.submit({
                providerId: 'credentials',
                options: {
                    redirect: false,
                    email: data.username,
                    password: data.password,
                    callbackUrl: "/dashboard",
                },
            });
            if (response.status) {
                console.log("Login successful:", response);
            } else {
                data.error = "Login failed";
            }
        } catch (error) {
            data.error = "Login failed", error;
        }
    });


    useVisibleTask$(({ track }) => {
        track(() => data);
        const queryParams = new URLSearchParams(loc.url.search);
        // Check if the error query parameter is present and if data.error is truthy
        if (queryParams.get("error")) {
            // Set the error message in the store
            data.error = "Failed to login try again";
            setTimeout(() => {
                data.error = "";
            }, 5000);
        }
    });
    return (
        <>
            <div class="col-lg-5 " style="border-radius: 20px; margin: 30px auto 0px auto; text-align: center;">
                <img src="/img/C.A.R.D_New.png" style="width: 250px; height: 120px;" />
            </div>

            <div class="tile col-lg-4" style="border-radius: 20px; margin: 30px auto 0px auto;">
                <h3 style="color:black;text-align:center"> Sign In </h3>
            </div>
            <div class="tile col-lg-4" style="margin: 20px auto 0px auto; border-radius: 30px; padding: 25px;">
                <form>
                    <div class="form-group" style="margin-bottom: 0px;">

                        <label class="col-form-label">Username / <span style="color:gray;"> Jina Unalotumia </span></label>
                        <input class="form-control form-control-sm input_style" type="text" name="username" value="" placeholder="Email or Phone: (255..)" required
                            onChange$={(e) => {
                                data.username = e.target.value
                            }}
                        />

                    </div>

                    <div class="form-group" style="margin-bottom: 0px;">
                        <label class="col-form-label"> Password / <span style="color:gray;"> Neno la Siri </span></label>
                        <input class="form-control form-control-sm input_style" type="password" name="password" value="" placeholder="Password" required
                            onChange$={(e) => {
                                data.password = e.target.value
                            }}
                        />

                    </div>
                    {data.error && (
                        <>
                            <br />
                            <Alert data={data} />
                        </>

                    )}
                    <div class="form-group" style="margin: 20px auto 20px auto;">
                        <i><a href="password_recovery.php" class="forgot_pass"><u> Reset Password </u></a></i>
                    </div>
                    <div class="form-group" style="margin: 20px auto 20px auto;">
                        <p>Don't have an account ? <i><a href="/auth/register" class="forgot_pass"><u> Register  </u></a></i> </p>
                    </div>

                    <div class="form-group" style="float: right;">
                        <a href="/" class="btn inputsubmit ml-auto">Home</a>
                        <button class="btn inputsubmit" type="button" onClick$={handleLogin} preventdefault:click>
                            Sign in
                        </button>
                    </div>
                    <br />

                </form>

            </div>
        </>
    )
})
export default component$(() => {
    return (
        <>
            <Login />
        </>
    )
})

