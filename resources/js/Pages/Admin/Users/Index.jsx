import { useForm } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';

// import DeleteUserForm from './Partials/DeleteUserForm';
// import UpdatePasswordForm from './Partials/UpdatePasswordForm';
// import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm';

export default function Index({ users }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        username: '',
        staff_code: '',
        password: '',
        password_confirmation: '',
    });

    function submit(e) {
        e.preventDefault();
        post('/admin/users', {
            onSuccess: () => reset()
        });
    }

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    User Management
                </h2>
            }
        >
            <Head title="User Management" />
            <div className='py-12'>
                <div className="flex flex-wrap p-5">
                    {/* Create User */}
                    <div className="w-full md:w-1/3">
                        <div className="bg-white m-4 p-4 shadow sm:rounded-lg sm:p-8">
                            <h2>Add New User</h2>
                            <hr />
                            <br />
                            <form onSubmit={submit} style={{ marginBottom: 20 }}>
                                <div className="mb-4">
                                    <InputLabel htmlFor="name" value="Name" />
                                    <TextInput
                                        id="name"
                                        name="name"
                                        value={data.name}
                                        className="mt-1 block w-full"
                                        autoComplete="name"
                                        isFocused={true}
                                        onChange={(e) => setData('name', e.target.value)}
                                        required
                                    />
                                    <InputError message={errors.name} className="mt-2" />

                                </div>
                                <div className="mb-4">
                                    <InputLabel htmlFor="email" value="Email" />
                                    <TextInput
                                        id="email"
                                        name="email"
                                        value={data.email}
                                        className="mt-1 block w-full"
                                        autoComplete="email"
                                        isFocused={true}
                                        onChange={(e) => setData('email', e.target.value)}
                                        required
                                    />
                                    <InputError message={errors.email} className="mt-2" />
                                </div>
                                <div className="mb-4">
                                    <InputLabel htmlFor="username" value="Username" />
                                    <TextInput
                                        id="username"
                                        name="username"
                                        value={data.username}
                                        className="mt-1 block w-full"
                                        autoComplete="username"
                                        isFocused={true}
                                        onChange={(e) => setData('username', e.target.value)}
                                        required
                                    />
                                    <InputError message={errors.username} className="mt-2" />
                                </div>
                                <div className="mb-4">
                                    <InputLabel htmlFor="staff_code" value="Staff Code" />
                                    <TextInput
                                        id="staff_code"
                                        name="staff_code"
                                        value={data.staff_code}
                                        className="mt-1 block w-full"
                                        autoComplete="staff_code"
                                        isFocused={true}
                                        onChange={(e) => setData('staff_code', e.target.value)}
                                        required
                                    />
                                    <InputError message={errors.staff_code} className="mt-2" />
                                </div>
                                <div className="mb-4">
                                    <InputLabel htmlFor="password" value="Password" />
                                    <TextInput
                                        id="password"
                                        name="password"
                                        type="password"
                                        value={data.password}
                                        className="mt-1 block w-full"
                                        autoComplete="new-password"
                                        isFocused={true}
                                        onChange={(e) => setData('password', e.target.value)}
                                        required
                                    />
                                    <InputError message={errors.password} className="mt-2" />
                                </div>
                                <div className="mb-4">
                                    <InputLabel htmlFor="password_confirmation" value="Confirm Password" />
                                    <TextInput
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        type="password"
                                        value={data.password_confirmation}
                                        className="mt-1 block w-full"
                                        autoComplete="new-password"
                                        isFocused={true}
                                        onChange={(e) => setData('password_confirmation', e.target.value)}
                                        required
                                    />
                                    <InputError message={errors.password_confirmation} className="mt-2" />
                                </div>


                                <PrimaryButton className="mt-4" disabled={processing}>
                                    Create User
                                </PrimaryButton>
                            </form>
                        </div>
                    </div>

                    {/* Users List */}
                    <div className="w-full md:w-2/3">
                        <div className="bg-white m-4 p-4 shadow sm:rounded-lg sm:p-8">
                            <div>
                                <h2>All Users</h2>
                                <hr />
                                <br />

                                <div className="overflow-x-auto">
                                    <table className="min-w-full border border-gray-200 rounded-lg ">
                                        <thead className="bg-gray-100">
                                            <tr>
                                                <th className="text-left px-4 py-2">Name</th>
                                                <th className="text-left px-4 py-2">Email</th>
                                                <th className="text-left px-4 py-2">Username</th>
                                                <th className="text-left px-4 py-2">Staff Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {users.map(user => (
                                                <tr key={user.id} className="border-t">
                                                    <td className="px-4 py-2">{user.name}</td>
                                                    <td className="px-4 py-2">{user.email}</td>
                                                    <td className="px-4 py-2">{user.username}</td>
                                                    <td className="px-4 py-2">{user.staff_code}</td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </AuthenticatedLayout>
    );
}