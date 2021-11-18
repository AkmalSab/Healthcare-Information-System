<template>
    <div class="table-responsive container">
        <h1>Staff</h1>
        <blockquote class="blockquote">
            <p>
                View and Register Staff 🚨
            </p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
        </figcaption>
        <div v-if="showMessage" class="alert alert-success">
            {{ message }}
        </div>

        <!-- Modal -->
        <div
            class="modal fade"
            id="editStaff"
            tabindex="-1"
            aria-labelledby="editStaffLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStaffLabel">
                            Edit Staff - {{ this.editForm.staffName }} 🌊
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="editForm.staffName"
                                        oninput="this.value = this.value.toUpperCase()"
                                        required
                                    />
                                    <div class="form-text">
                                        Please input staff name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">NRIC</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="editForm.staffIC"
                                        maxlength="12"
                                        required
                                    />
                                    <div class="form-text">
                                        Please input staff identification
                                        number.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Role</label>
                                <select
                                    class="form-select"
                                    v-model="editForm.staffRole"
                                    required
                                >
                                    <option selected
                                        >Open this select menu</option
                                    >
                                    <option
                                        v-for="roleName in role"
                                        :key="roleName.id"
                                        :value="roleName.id"
                                        >{{ roleName.name }}</option
                                    >
                                </select>
                                <div class="form-text">
                                    Please input staff role.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Phone No.</label>
                                    <input
                                        type="phone"
                                        class="form-control"
                                        v-model="editForm.staffPhone"
                                        maxlength="12"
                                        min="10"
                                        required
                                    />
                                    <div class="form-text">
                                        Please input staff phone number.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label"
                                        >Maritial Status</label
                                    >
                                    <select
                                        class="form-select"
                                        v-model="editForm.staffMaritial"
                                        required
                                    >
                                        <option selected
                                            >Open this select menu</option
                                        >
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Windowed"
                                            >Widowed</option
                                        >
                                        <option value="Divorced"
                                            >Divorced</option
                                        >
                                    </select>
                                    <div class="form-text">
                                        Please input staff maritial status.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Occupation</label>
                                    <select
                                        class="form-select"
                                        v-model="editForm.staffOccupation"
                                        required
                                    >
                                        <optgroup label="Other Occupations:">
                                            <option value="Doctor"
                                                >Doctor</option
                                            >
                                            <option value="Nurse">Nurse</option>
                                        </optgroup>
                                    </select>
                                    <div class="form-text">
                                        Please input staff occupation.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label"
                                        >Date of Birth</label
                                    >
                                    <input
                                        type="date"
                                        class="form-control"
                                        v-model="editForm.staffDOB"
                                        required
                                    />
                                    <div class="form-text">
                                        Please input staff date of birth.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <select
                                        class="form-select"
                                        v-model="editForm.staffGender"
                                        required
                                    >
                                        <option selected
                                            >Open this select menu</option
                                        >
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="form-text">
                                        Please input staff gender.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Religion</label>
                                    <select
                                        class="form-select"
                                        v-model="editForm.staffReligion"
                                        required
                                    >
                                        <option selected
                                            >Open this select menu</option
                                        >
                                        <option value="Muslim">Muslim</option>
                                        <option value="Buddhist"
                                            >Buddhist</option
                                        >
                                        <option value="Christian"
                                            >Christian</option
                                        >
                                        <option value="Hindu">Hindu</option>
                                        <option value="Chinese Religionist"
                                            >Chinese Religionist</option
                                        >
                                        <option value="Others">Others</option>
                                    </select>
                                    <div class="form-text">
                                        Please input staff religion.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <select
                                        class="form-select"
                                        v-model="editForm.staffCountry"
                                        required
                                    >
                                        <option selected
                                            >Open this select menu</option
                                        >
                                        <option value="Malaysia"
                                            >Malaysia</option
                                        >
                                    </select>
                                    <div class="form-text">
                                        Please input staff nationality.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Race</label>
                                    <select
                                        class="form-select"
                                        v-model="editForm.staffRace"
                                        required
                                    >
                                        <option selected
                                            >Open this select menu</option
                                        >
                                        <option value="Malay">Malay</option>
                                        <option value="Chinese">Chinese</option>
                                        <option value="Indian">Indian</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <div class="form-text">
                                        Please input staff race.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Address 1</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="editForm.staffAddress1"
                                        required
                                    />
                                    <div class="form-text">
                                        Please input staff address line 1.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Address 2</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="editForm.staffAddress2"
                                        required
                                    />
                                    <div class="form-text">
                                        Please input staff address line 2.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">State</label>
                                    <select
                                        class="form-select"
                                        v-model="editForm.staffState"
                                        required
                                    >
                                        <option value="Johor">Johor</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Kelantan"
                                            >Kelantan</option
                                        >
                                        <option value="Kuala Lumpur"
                                            >Kuala Lumpur</option
                                        >
                                        <option value="Labuan">Labuan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan"
                                            >Negeri Sembilan</option
                                        >
                                        <option value="Pahang">Pahang</option>
                                        <option value="Penang">Penang</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Putrajaya"
                                            >Putrajaya</option
                                        >
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="Selangor"
                                            >Selangor</option
                                        >
                                        <option value="Terengganu"
                                            >Terengganu</option
                                        >
                                    </select>
                                    <div class="form-text">
                                        Please input staff state address.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Postcode</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="editForm.staffPostcode"
                                        maxlength="6"
                                        required
                                    />
                                    <div class="form-text">
                                        Please input postcode address.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="editForm.staffCity"
                                        required
                                    />
                                    <div class="form-text">
                                        Please input city address.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            style="color:white"
                        >
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storeStaff">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="staffName" class="form-label"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="form.staffName"
                                    oninput="this.value = this.value.toUpperCase()"
                                    style="text-transform:uppercase"
                                    id="staffName"
                                    aria-describedby="staffNameHelp"
                                    required
                                />
                                <div id="staffNameHelp" class="form-text">
                                    Please input staff name.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="staffIC" class="form-label"
                                    >NRIC</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="form.staffIC"
                                    id="staffIC"
                                    aria-describedby="staffICHelp"
                                    maxlength="12"
                                    required
                                />
                                <div id="staffICHelp" class="form-text">
                                    Please input staff identification number.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="staffRole" class="form-label"
                                >Role</label
                            >
                            <select
                                class="form-select"
                                v-model="form.staffRole"
                                id="patMaritial"
                                aria-label="staffRoleHelp"
                                aria-describedby="staffRoleHelp"
                                required
                            >
                                <option selected>Open this select menu</option>
                                <option
                                    v-for="roleName in role"
                                    :key="roleName.id"
                                    :value="roleName.id"
                                    >{{ roleName.name }}</option
                                >
                            </select>
                            <div id="staffRoleHelp" class="form-text">
                                Please input staff role.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="staffPhone" class="form-label"
                                    >Phone No.</label
                                >
                                <input
                                    type="phone"
                                    class="form-control"
                                    v-model="form.staffPhone"
                                    id="staffPhone"
                                    aria-describedby="staffPhoneHelp"
                                    maxlength="12"
                                    min="10"
                                    required
                                />
                                <div id="staffPhoneHelp" class="form-text">
                                    Please input staff phone number.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="staffMaritial" class="form-label"
                                    >Maritial Status</label
                                >
                                <select
                                    class="form-select"
                                    v-model="form.staffMaritial"
                                    id="staffMaritial"
                                    aria-label="staffMaritialHelp"
                                    aria-describedby="staffMaritialHelp"
                                    required
                                >
                                    <option selected
                                        >Open this select menu</option
                                    >
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Windowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                                <div id="staffMaritialHelp" class="form-text">
                                    Please input staff maritial status.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="staffOccupation" class="form-label"
                                    >Occupation</label
                                >
                                <select
                                    class="form-select"
                                    v-model="form.staffOccupation"
                                    id="occupation"
                                    aria-label="staffOccupation"
                                    aria-describedby="staffOccupationHelp"
                                    required
                                >
                                    <option selected
                                        >Open this select menu</option
                                    >
                                    <optgroup label="Other Occupations:">
                                        <option value="Doctor">Doctor</option>
                                        <option value="Nurse">Nurse</option>
                                    </optgroup>
                                </select>
                                <div id="staffOccupationHelp" class="form-text">
                                    Please input staff occupation.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="staffDOB" class="form-label"
                                    >Date of Birth</label
                                >
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="form.staffDOB"
                                    id="staffDOB"
                                    aria-describedby="staffDOBHelp"
                                    required
                                />
                                <div id="staffDOBHelp" class="form-text">
                                    Please input staff date of birth.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="staffGender" class="form-label"
                                    >Gender</label
                                >
                                <select
                                    class="form-select"
                                    v-model="form.staffGender"
                                    id="staffGender"
                                    aria-label="staffGender"
                                    aria-describedby="staffGenderHelp"
                                    required
                                >
                                    <option selected
                                        >Open this select menu</option
                                    >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div id="staffGenderHelp" class="form-text">
                                    Please input staff gender.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="staffReligion" class="form-label"
                                    >Religion</label
                                >
                                <select
                                    class="form-select"
                                    v-model="form.staffReligion"
                                    id="staffReligion"
                                    aria-label="staffReligion"
                                    aria-describedby="staffReligionHelp"
                                    required
                                >
                                    <option selected
                                        >Open this select menu</option
                                    >
                                    <option value="Muslim">Muslim</option>
                                    <option value="Buddhist">Buddhist</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Chinese Religionist"
                                        >Chinese Religionist</option
                                    >
                                    <option value="Others">Others</option>
                                </select>
                                <div id="staffReligionHelp" class="form-text">
                                    Please input staff religion.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="staffCountry" class="form-label"
                                    >Country</label
                                >
                                <select
                                    class="form-select"
                                    v-model="form.staffCountry"
                                    id="staffCountry"
                                    aria-label="staffCountry"
                                    aria-describedby="staffCountryHelp"
                                    required
                                >
                                    <option selected
                                        >Open this select menu</option
                                    >
                                    <option value="Malaysia">Malaysia</option>
                                </select>
                                <div id="staffCountryHelp" class="form-text">
                                    Please input staff nationality.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="staffRace" class="form-label"
                                    >Race</label
                                >
                                <select
                                    class="form-select"
                                    v-model="form.staffRace"
                                    id="staffRace"
                                    aria-label="staffRace"
                                    aria-describedby="staffRaceHelp"
                                    required
                                >
                                    <option selected
                                        >Open this select menu</option
                                    >
                                    <option value="Malay">Malay</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Indian">Indian</option>
                                    <option value="Others">Others</option>
                                </select>
                                <div id="staffRaceHelp" class="form-text">
                                    Please input staff race.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="staffAddress1" class="form-label"
                                    >Address 1</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="form.staffAddress1"
                                    id="staffAddress1"
                                    aria-describedby="staffAddress1Help"
                                    required
                                />
                                <div id="staffAddress1Help" class="form-text">
                                    Please input staff address line 1.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="staffAddress2" class="form-label"
                                    >Address 2</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="form.staffAddress2"
                                    id="staffAddress2"
                                    aria-describedby="staffAddress2Help"
                                    required
                                />
                                <div id="staffAddress2Help" class="form-text">
                                    Please input staff address line 2.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="staffState" class="form-label"
                                    >State</label
                                >
                                <select
                                    class="form-select"
                                    v-model="form.staffState"
                                    id="staffState"
                                    aria-label="staffStateHelp"
                                    aria-describedby="staffStateHelp"
                                    required
                                >
                                    <option value="Johor">Johor</option>
                                    <option value="Kedah">Kedah</option>
                                    <option value="Kelantan">Kelantan</option>
                                    <option value="Kuala Lumpur"
                                        >Kuala Lumpur</option
                                    >
                                    <option value="Labuan">Labuan</option>
                                    <option value="Melaka">Melaka</option>
                                    <option value="Negeri Sembilan"
                                        >Negeri Sembilan</option
                                    >
                                    <option value="Pahang">Pahang</option>
                                    <option value="Penang">Penang</option>
                                    <option value="Perak">Perak</option>
                                    <option value="Perlis">Perlis</option>
                                    <option value="Putrajaya">Putrajaya</option>
                                    <option value="Sabah">Sabah</option>
                                    <option value="Sarawak">Sarawak</option>
                                    <option value="Selangor">Selangor</option>
                                    <option value="Terengganu"
                                        >Terengganu</option
                                    >
                                </select>
                                <div id="staffStateHelp" class="form-text">
                                    Please input staff state address.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="staffPostcode" class="form-label"
                                    >Postcode</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="form.staffPostcode"
                                    id="staffPostcode"
                                    aria-describedby="staffPostcodeHelp"
                                    maxlength="6"
                                    required
                                />
                                <div id="staffPostcodeHelp" class="form-text">
                                    Please input postcode address.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="staffCity" class="form-label"
                                    >City</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="form.staffCity"
                                    id="staffCity"
                                    aria-describedby="staffCityHelp"
                                    required
                                />
                                <div id="staffCityHelp" class="form-text">
                                    Please input city address.
                                </div>
                            </div>
                        </div>
                    </div>
                    <button
                        type="submit"
                        style="width: 100%; color: white"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                </form>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <table class="table text-center" id="staffBiodateTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">NRIC</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Birthdate</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Religion</th>
                            <th scope="col">Race</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(staff, index) in staffs" :key="staff.id">
                            <th scope="row">{{ staff.id }}</th>
                            <td>{{ staff.name }}</td>
                            <td>{{ staff.nric }}</td>
                            <td>{{ staff.phone }}</td>
                            <td>{{ staff.birthdate }}</td>
                            <td>{{ staff.gender }}</td>
                            <td>{{ staff.religion }}</td>
                            <td>{{ staff.race }}</td>
                            <td>
                                <button
                                    class="btn btn-primary"
                                    style="color:white"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editStaff"
                                    @click="modalOpen(index)"
                                >
                                    Edit
                                </button>
                                <button
                                    class="btn btn-danger"
                                    style="color:white"
                                    @click="deleteStaff(staff.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},
    data() {
        return {
            active: 0,
            showMessage: false,
            message: "",
            staffs: [],
            role: [],
            form: {
                staffName: "",
                staffRole: "",
                staffIC: "",
                staffPhone: "",
                staffMaritial: "",
                staffOccupation: "",
                staffDOB: "",
                staffGender: "",
                staffReligion: "",
                staffCountry: "",
                staffRace: "",
                staffAddress1: "",
                staffAddress2: "",
                staffState: "",
                staffPostcode: "",
                staffCity: ""
            },
            editForm: {
                staffName: "",
                staffRole: "",
                staffIC: "",
                staffPhone: "",
                staffMaritial: "",
                staffOccupation: "",
                staffDOB: "",
                staffGender: "",
                staffReligion: "",
                staffCountry: "",
                staffRace: "",
                staffAddress1: "",
                staffAddress2: "",
                staffState: "",
                staffPostcode: "",
                staffCity: ""
            }
        };
    },
    created() {
        this.getStaff();
        this.getRoles();
    },
    methods: {
        getStaff() {
            axios
                .get("/api/staff")
                .then(res => {
                    this.staffs = res.data.data;
                    this.$nextTick(() => {
                        $("#staffBiodateTable").DataTable({
                            bRetrieve: true,
                            columnDefs: [{ orderable: false, targets: [4, 8] }]
                        });
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getRoles() {
            axios
                .get("/api/role")
                .then(res => {
                    this.role = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        modalOpen: function(i) {
            this.editForm.staffName = this.staffs[i].name;
            this.editForm.staffIC = this.staffs[i].nric;
            this.editForm.staffRole = this.staffs[i].role_id;
            this.editForm.staffPhone = this.staffs[i].phone;
            this.editForm.staffMaritial = this.staffs[i].marital_status;
            this.editForm.staffOccupation = this.staffs[i].occupation;
            this.editForm.staffDOB = this.staffs[i].birthdate;
            this.editForm.staffGender = this.staffs[i].gender;
            this.editForm.staffReligion = this.staffs[i].religion;
            this.editForm.staffCountry = this.staffs[i].country;
            this.editForm.staffRace = this.staffs[i].race;
            this.editForm.staffAddress1 = this.staffs[i].address_1;
            this.editForm.staffAddress2 = this.staffs[i].address_2;
            this.editForm.staffState = this.staffs[i].state;
            this.editForm.staffPostcode = this.staffs[i].postcode;
            this.editForm.staffCity = this.staffs[i].city;

            return (this.active = i);
        },
        storeStaff() {
            axios
                .post("/api/staff", {
                    name: this.form.staffName,
                    role: this.form.staffRole,
                    nric: this.form.staffIC,
                    phone: this.form.staffPhone,
                    marital_status: this.form.staffMaritial,
                    occupation: this.form.staffOccupation,
                    birthdate: this.form.staffDOB,
                    gender: this.form.staffGender,
                    religion: this.form.staffReligion,
                    country: this.form.staffCountry,
                    race: this.form.staffRace,
                    address_1: this.form.staffAddress1,
                    address_2: this.form.staffAddress2,
                    state: this.form.staffState,
                    postcode: this.form.staffPostcode,
                    city: this.form.staffCity
                })
                .then(res => {
                    Swal.fire({
                        icon: "success",
                        title: "Registered",
                        text: "Staff successfully registered!"
                    }).then(res => {
                        if (res.isConfirmed) {
                            $("#staffBiodateTable")
                                .DataTable()
                                .destroy();
                            this.getStaff();
                        }
                    });
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        deleteStaff(id) {
            axios.delete("/api/staff/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                $("#staffBiodateTable")
                    .DataTable()
                    .destroy();
                this.getStaff();
            });
        }
    }
};
</script>

<style></style>
