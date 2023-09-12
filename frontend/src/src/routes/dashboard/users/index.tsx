import { component$ } from "@builder.io/qwik";
import { routeLoader$ } from "@builder.io/qwik-city";

export const useGetUsers = routeLoader$(async () => {
  // const prisma = new PrismaClient();
  // const users = await prisma.registration.findMany();
  const users = [{id:"",f_name:"", email:""}]
  return users;
});

export default component$(() => {
  const users = useGetUsers();
  return (
    <section>
      <h1>User's directory</h1>
      <ul>
        {users.value.map((user) => (
          <li key={user.id}>
            <a href={`/users/${user.id}`}>
              {user.f_name} ({user.email})
            </a>
          </li>
        ))}
        
      </ul>
    </section>
  );
});
