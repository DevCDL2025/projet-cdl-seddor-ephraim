<script setup>
import HeadingLayout from "@/App/Layouts/HeadingLayout.vue";

defineProps({
    viewElements: Object,
    viewModel: Object,
})
</script>

<template>
    <heading-layout>
        <div class="row">
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dr-profile-bg rounded-top position-relative mx-n3 mt-n3 position-relative">
                            <img src="assets/images/users/avatar-3.jpg" alt="" class="border border-light border-3 rounded-circle position-absolute top-100 start-50 translate-middle" height="100" width="100">
                        </div>
                        <div class="mt-4 mb-2 pt-3  text-center">
                            <p class="mb-1 fs-18 fw-semibold text-dark">Dr. DE SOUZA</p>
                            <p class="mb-0 fw-medium text-muted">(MD , Cardiologue)</p>
                        </div>
                        <h5 class="card-title fw-semibold">A propos :</h5>
                        <p class="mt-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab aliquam atque beatae dignissimos doloremque, dolores dolorum ducimus error facere facilis illum inventore minima nostrum quam quis totam, vel vero.
                        </p>

                        <h5 class="card-title fw-semibold mt-4 mb-2">Département</h5>
                        <span class="badge bg-light text-dark my-1 px-2 py-1 rounded-pill fw-medium fs-12">Cardologie</span>
                        <span class="badge bg-light text-dark my-1 px-2 py-1 rounded-pill fw-medium fs-12">Endocrinologie</span>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12">
                                <div>
                                    <h4 class="card-title">Information personnelle :</h4>
                                    <div class="table-responsive mt-3 border border-dashed rounded px-2 py-1">
                                        <table class="table table-borderless m-0">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <p class="mb-0"> Nom : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">Dr. DE SOUZA</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0"> Position : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">Radiologie, CDL</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0"> Mobile Number : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">+066 000 000 000</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0">Adresse email : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">jamesdroger@armyspy.com</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="mb-0">Location : </p>
                                                </td>
                                                <td class="px-2 text-dark fw-medium fs-14">Libreville, Gabon</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div>
                                    <h4 class="card-title">Evalutation :</h4>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-1">
                                        <p class="mb-0 fs-15 fw-medium text-dark">Notation 1</p>
                                        <div>
                                            <p class="mb-0 fs-15 fw-medium text-dark">40%</p>
                                        </div>
                                    </div>
                                    <div class="progress progress-soft progress-md">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-1">
                                        <p class="mb-0 fs-15 fw-medium text-dark">Notation 2</p>
                                        <div>
                                            <p class="mb-0 fs-15 fw-medium text-dark">50%</p>
                                        </div>
                                    </div>
                                    <div class="progress progress-soft progress-md">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-1">
                                        <p class="mb-0 fs-15 fw-medium text-dark">Notation 3</p>
                                        <div>
                                            <p class="mb-0 fs-15 fw-medium text-dark">34%</p>
                                        </div>
                                    </div>
                                    <div class="progress progress-soft progress-md">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 34%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-1">
                                        <p class="mb-0 fs-15 fw-medium text-dark">Notation 4</p>
                                        <div>
                                            <p class="mb-0 fs-15 fw-medium text-dark">60%</p>
                                        </div>
                                    </div>
                                    <div class="progress progress-soft progress-md">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title mt-3 pt-2">Experience :</h4>
                        <div class="row g-3 mt-1">
                            <div class="col-xl-6 col-lg-12">
                                <div class="d-flex flex-wrap p-2 align-items-center rounded gap-3 border">
                                    <div>
                                        <p class="text-dark fw-semibold mb-1 fs-16">CHU 1</p>
                                        <p class="text-dark fw-medium mb-1 fs-14">Poste 1</p>
                                        <p class="mb-1">Dec 2020 - Present , 4 yer 1 mos</p>
                                        <p class="mb-1">Ville</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="d-flex flex-wrap p-2 align-items-center rounded gap-3 border">
                                    <div>
                                        <p class="text-dark fw-semibold mb-1 fs-16">CHU 2</p>
                                        <p class="text-dark fw-medium mb-1 fs-14">Poste 2</p>
                                        <p class="mb-1">Dec 2016 - Nov 2020 , 5 yer 4 mos</p>
                                        <p class="mb-1">Libreville, Gabon</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="d-flex flex-wrap p-2 align-items-center rounded gap-3 border">
                                    <div>
                                        <p class="text-dark fw-semibold mb-1 fs-16">CHU 3</p>
                                        <p class="text-dark fw-medium mb-1 fs-14">Poste 3</p>
                                        <p class="mb-1">Dec 2014 - Nov 2016 , 3 yer 2 mos</p>
                                        <p class="mb-1">Libreville, Gabon</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom border-dashed">
                                <h4 class="card-title mb-0">Historique</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                        <thead class="bg-light bg-opacity-25">
                                            <tr>
                                                <th>Position</th>
                                                <th>Début</th>
                                                <th>Fin</th>
                                                <th>Observation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-0 text-dark">
                                                        <a href="#!" class="text-dark">Position 1</a>
                                                    </h5>
                                                </td>
                                                <td>Mars 2019</td>
                                                <td>
                                                    Fev. 2022
                                                </td>
                                                <td> Observation </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-0 text-dark">
                                                        <a href="#!" class="text-dark">Position 1</a>
                                                    </h5>
                                                </td>
                                                <td>Mars 2019</td>
                                                <td>
                                                    Fev. 2022
                                                </td>
                                                <td> Observation </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="mb-0 text-dark">
                                                        <a href="#!" class="text-dark">Position 1</a>
                                                    </h5>
                                                </td>
                                                <td>Mars 2019</td>
                                                <td>
                                                    Fev. 2022
                                                </td>
                                                <td> Observation </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </heading-layout>
</template>


