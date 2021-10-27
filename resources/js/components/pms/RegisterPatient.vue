<template>
    <div class="container">
    <h1>Register Patient</h1>
        <blockquote class="blockquote">
            <p>This form is for patient registration.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
        </figcaption>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="patName" aria-describedby="patNameHelp">
                                    <div id="patNameHelp" class="form-text">Please input patient name.</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patIC" class="form-label">NRIC</label>
                                    <input type="text" class="form-control" id="patIC" aria-describedby="patICHelp">
                                    <div id="patICHelp" class="form-text">Please input patient identification number.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patPhone" class="form-label">Phone No.</label>
                                    <input type="number" class="form-control" id="patAddress2" aria-describedby="patPhoneHelp">
                                    <div id="patPhoneHelp" class="form-text">Please input patient phone number.</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patMaritial" class="form-label">Maritial Status</label>
                                    <select class="form-select" aria-label="Default select example" aria-describedby="patMaritialHelp">
                                        <option selected>Open this select menu</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Windowed">Windowed</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                    <div id="patMaritialHelp" class="form-text">Please input patient maritial status.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patDOB" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="patDOB" aria-describedby="patDOBHelp">
                                    <div id="patDOBHelp" class="form-text">Please input patient date of birth.</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patGender" class="form-label">Gender</label>
                                    <select class="form-select" aria-label="Default select example" aria-describedby="patGenderHelp">
                                        <option selected>Open this select menu</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div id="patGenderHelp" class="form-text">Please input patient gender.</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patReligion" class="form-label">Religion</label>
                                    <select class="form-select" aria-label="Default select example" aria-describedby="patReligionHelp">
                                        <option selected>Open this select menu</option>
                                        <option value="Muslim">Muslim</option>
                                        <option value="Buddhist">Buddhist</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Chinese Religionist">Chinese Religionist</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <div id="patReligionHelp" class="form-text">Please input patient religion.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patCountry" class="form-label">Country</label>
                                    <select class="form-select" aria-label="Default select example" aria-describedby="patCountryHelp">
                                        <option selected>Open this select menu</option>
                                        <option value="Malaysia">Malaysia</option>
                                    </select>
                                    <div id="patCountryHelp" class="form-text">Please input patient nationality.</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patRace" class="form-label">Race</label>
                                    <select class="form-select" aria-label="Default select example" aria-describedby="patRaceHelp">
                                        <option selected>Open this select menu</option>
                                        <option value="Malay">Malay</option>
                                        <option value="Chinese">Chinese</option>
                                        <option value="Indian">Indian</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <div id="patRaceHelp" class="form-text">Please input patient race.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patAddress1" class="form-label">Address 1</label>
                                    <input type="text" class="form-control" id="patAddress1" aria-describedby="patAddress1Help">
                                    <div id="patAddress1Help" class="form-text">Please input patient address 1.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patAddress2" class="form-label">Address 2</label>
                                    <input type="text" class="form-control" id="patAddress2" aria-describedby="patAddress2Help">
                                    <div id="patAddress2Help" class="form-text">Please input patient address 2.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patState" class="form-label">State</label>
                                    <input type="text" class="form-control" id="patState" aria-describedby="patStateHelp">
                                    <div id="patStateHelp" class="form-text">Please input patient state address.</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patPostcode" class="form-label">Postcode</label>
                                    <input type="number" class="form-control" id="patPostcode" aria-describedby="patPostcodeHelp">
                                    <div id="patPostcodeHelp" class="form-text">Please input postcode address.</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="patCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="patCity" aria-describedby="patCityHelp">
                                    <div id="patCityHelp" class="form-text">Please input city address.</div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="width: 100%; color: white" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>