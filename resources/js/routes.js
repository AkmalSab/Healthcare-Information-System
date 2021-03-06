import PmsIndex from './components/pms/Index';
import pmsPatientRegister from './components/pms/registration/RegisterPatient';
import PmsPatientMasterIndex from './components/pms/pmi/PatientMasterIndex';
import PmsPatientBiodata from './components/pms/pmi/PatientBiodata';
import PmsSpouseFamilyInformation from './components/pms/pmi/SpouseFamilyInformation';
import PmsInsurancePanelInformation from './components/pms/pmi/InsurancePanelInformation';
import cisIndex from './components/cis/Index';

export const routes = [
    {
        path: '/pms',
        name: 'PmsIndex',
        component: PmsIndex
    },
    {
        path: '/pms/registration',
        name: 'pmsPatientRegister',
        component: pmsPatientRegister
    },
    {
        path: '/pms/patientMasterIndex',
        name: 'PmsPatientMasterIndex',
        component: PmsPatientMasterIndex
    },
    {
        path: '/pms/patientMasterIndex/patientBiodata',
        name: 'PmsPatientBiodata',
        component: PmsPatientBiodata
    },
    {
        path: '/pms/patientMasterIndex/spouseFamilyInformation',
        name: 'PmsSpouseFamilyInformation',
        component: PmsSpouseFamilyInformation
    },
    {
        path: '/pms/patientMasterIndex/insurancePanelInformation',
        name: 'PmsInsurancePanelInformation',
        component: PmsInsurancePanelInformation
    },
    {
        path: '/cis',
        name: 'cisIndex',
        component: cisIndex
    },
];