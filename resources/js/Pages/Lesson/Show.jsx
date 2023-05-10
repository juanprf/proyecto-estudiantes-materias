import { EmptyState } from '@/Components/EmptyState';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { PaperClipIcon, UserGroupIcon, UserIcon } from '@heroicons/react/20/solid'
import { Head, Link } from '@inertiajs/react';

export default function Show({auth,lesson,students}) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Lección: {lesson.name}</h2>}
        >
            <Head title="Lección" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="px-4 sm:px-6 lg:px-8">
                        <div className="sm:flex sm:items-center">
                            <div className="sm:flex-auto">
                                <h1 className="text-base font-semibold leading-6 text-gray-900">Lección: {lesson.name}</h1>
                                <p className="mt-2 text-sm text-gray-700">Información detallada de la lección</p>
                            </div>
                            <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <Link href={route('lesson.edit',lesson.id)} className="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Editar lección</Link>
                            </div>
                        </div>
                        <div className="mt-8 flow-root overflow-hidden bg-white shadow sm:rounded-lg py-4 px-6">
                            <dl className="grid grid-cols-1 sm:grid-cols-2">
                                <div className="border-gray-100 px-4 py-4 sm:col-span-1 sm:px-0">
                                    <dt className="text-sm font-medium leading-6 text-gray-900">Registrada</dt>
                                    <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{lesson.created_at}</dd>
                                </div>
                                <div className="border-gray-100 px-4 py-4 sm:col-span-1 sm:px-0">
                                    <dt className="text-sm font-medium leading-6 text-gray-900">Actualizada</dt>
                                    <dd className="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{lesson.updated_at}</dd>
                                </div>
                                <div className="mt-10">
                                    <h3 className="text-sm font-medium text-gray-500">Asignar estudiantes (click para en el estudiante para asignar)</h3>
                                    <ul role="list" className="mt-4 flex flex-row space-x-2 pb-4">
                                        {
                                            students.map(student => (
                                                <li key={student.id}>
                                                    <Link href={route('student_lesson_assign_store',{student: student.id,lesson: lesson.id})} method='post' as='button' className="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-600/10">{student.name}</Link>
                                                </li>
                                            ))
                                        }
                                    </ul>
                                </div>
                                <div className="border-t border-gray-100 px-4 py-4 sm:col-span-2 sm:px-0">
                                    <dt className="text-sm font-medium leading-6 text-gray-900">Estudiantes registrados</dt>
                                    <dd className="mt-2 text-sm text-gray-900">
                                        <ul role="list" className="divide-y divide-gray-100 rounded-md border border-gray-200">
                                            {
                                                lesson.students.length == 0
                                                ?
                                                    <EmptyState
                                                        Icon={<UserGroupIcon className="mx-auto h-12 w-12 text-gray-400" />}
                                                        title="Estudiantes"
                                                        subtitle="No se han registrado estudiantes"
                                                        buttonTitle="Nuevo estudiante"
                                                        buttonUrl={route('student.create')}
                                                    />
                                                :
                                                    lesson.students.map(student=>(
                                                        <li key={`${student.id}`} className="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                            <div className="flex w-0 flex-1 items-center">
                                                                <UserIcon className="h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
                                                                <div className="ml-4 flex min-w-0 flex-1 gap-2">
                                                                    <span className="truncate font-medium">{student.name}</span>
                                                                </div>
                                                            </div>
                                                            <div className="ml-4 flex-shrink-0 space-x-4">
                                                                <Link href={route('student.show',student.id)} className="font-medium text-indigo-600 hover:text-indigo-500">Ver</Link>
                                                                <Link href={route('lesson_assign_destroy',{student: student.id,lesson: lesson.id})} method='post' as="button" className="font-medium text-indigo-600 hover:text-indigo-500">Eliminar asignación</Link>
                                                            </div>
                                                        </li>
                                                    ))
                                            }
                                        </ul>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
