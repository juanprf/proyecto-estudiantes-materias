import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Transition } from '@headlessui/react';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Edit({student,auth}) {
    const { data, setData, errors, put, reset, processing, recentlySuccessful } = useForm({
        name: student.name,
        email: student.email,
    });
    const onSubmit = (e) => {
        e.preventDefault();
        put(route('student.update',student.id), {
            preserveScroll: true,
            onSuccess: () => reset(),
        });
    }
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Editar estudiante</h2>}
        >
            <Head title="Editar estudiante" />
            <div className="py-12">
                <div className="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6 items-center justify-center">
                    <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <header>
                            <h2 className="text-lg font-medium text-gray-900">Formulario</h2>
                            <p className="mt-1 text-sm text-gray-600">Ingrese los datos de la estudiante</p>
                        </header>
                        <form onSubmit={onSubmit} className="mt-6 space-y-6">
                            <div>
                                <InputLabel htmlFor="name" value="Nombre" />
                                <TextInput
                                    value={data.name}
                                    onChange={(e) => setData('name', e.target.value)}
                                    type="text"
                                    className="mt-1 block w-full"
                                    autoComplete="current-password"
                                />
                                <InputError message={errors.name} className="mt-2" />
                            </div>
                            <div>
                                <InputLabel htmlFor="email" value="Correo electrónico" />
                                <TextInput
                                    value={data.email}
                                    onChange={(e) => setData('email', e.target.value)}
                                    type="text"
                                    className="mt-1 block w-full"
                                    autoComplete="current-password"
                                />
                                <InputError message={errors.email} className="mt-2" />
                            </div>
                            <div className="flex items-center gap-4">
                                <PrimaryButton disabled={processing}>Guardar</PrimaryButton>
                                <Transition
                                    show={recentlySuccessful}
                                    enterFrom="opacity-0"
                                    leaveTo="opacity-0"
                                    className="transition ease-in-out"
                                >
                                    <p className="text-sm text-gray-600">Guardar</p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
