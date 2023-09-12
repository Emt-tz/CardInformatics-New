import { component$ } from "@builder.io/qwik";
import { routeLoader$ } from "@builder.io/qwik-city";

export const useGetUser = routeLoader$(async ({  }) => {
  // const userId = parseInt(params["userId"], 10);
  // const prisma = new PrismaClient();
  // const user = await prisma.user.findUnique({ where: { id: userId } });
  // if (!user) {
  //   // Set the status to 404 if the user is not found
  //   status(404);
  // }
  return [];
});

export default component$(() => {
  const user = useGetUser();
  return (
    <section>
      <h1>User detail</h1>
      {user.value ? (
        <>
          <p>Name: {user}</p>
          <p>Email: {user}</p>
        </>
      ) : (
        <p>User not found</p>
      )}
    </section>
  );
});
