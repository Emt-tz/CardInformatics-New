import { serverAuth$ } from "@builder.io/qwik-auth";
import type { Provider } from "@auth/core/providers";
import CredentialsProvider from '@auth/core/providers/credentials';
import { PrismaClient } from "@prisma/client";

export const { useAuthSignin, useAuthSignout, useAuthSession, onRequest } = serverAuth$(() => {
  const prisma = new PrismaClient();

  return {
    secret: import.meta.env.VITE_AUTH_SECRET,
    trustHost: true,
    pages: {
      signIn: "/auth/login/",
      error: "/auth/login"
    },
    providers: [
      CredentialsProvider({
        id: "credentials",
        name: 'Login',
        authorize: async (credentials) => {
          if (credentials) {
            const user = await prisma.registration.findUnique({
              where: {
                email: `${credentials.username}`
              },
            });
            if (user && user.password === credentials.password) {
              return {
                id: user.id,
                name: user.f_name,
                email: user.email,
              };
            }
          }

          return null;
        },
        // credentials: {
        //   username: { label: 'Email or Phone Number', type: 'text' },
        //   password: { label: 'Password', type: 'password' },
        // },
      }),
    ] as Provider[],
  };
});
