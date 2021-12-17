import PmsIndex from './components/pms/Index';
import pmsPatientRegister from './components/pms/registration/RegisterPatient';
import PmsPatientMasterIndex from './components/pms/pmi/PatientMasterIndex';
import PmsPatientBiodata from './components/pms/pmi/PatientBiodata';
import PmsSpouseFamilyInformation from './components/pms/pmi/SpouseFamilyInformation';
import PmsInsurancePanelInformation from './components/pms/pmi/InsurancePanelInformation';
import pmsPatientRegisterNextofKin from './components/pms/registration/RegisterNextofKin';
import pmsPatientRegisterInsurance from './components/pms/registration/RegisterInsurance';
import pmsPatientRegisterAppointment from './components/pms/registration/RegisterAppointment';
import pmsPatientAppointmentInformation from './components/pms/pmi/AppointmentInformation';

import pmsPatientBilling from './components/pms/billing/Index.vue';

import cisIndex from './components/cis/Index';
import cisConsultationHistory from './components/cis/ViewConsultation';
import pisIndex from './components/pis/Index';
import pisCreateMeds from "./components/pis/CreateMedicine";
import pisCreatePrescription from "./components/pis/CreatePrescription";

import ltIndex from './components/lt/Index';
import ltTypeofCase from './components/lt/TypeofCase';
import ltRole from './components/lt/Role';
import ltInsurance from './components/lt/Insurance';
import ltMedicine from './components/lt/Medicine';
import ltStaff from './components/lt/Staff';

import icd10Index from './components/icd10/Index';
import queueIndex from './components/queue/Index';

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
        path: '/pms/pmi/patientBiodata',
        name: 'PmsPatientBiodata',
        component: PmsPatientBiodata
    },
    {
        path: '/pms/pmi/spouseFamilyInformation',
        name: 'PmsSpouseFamilyInformation',
        component: PmsSpouseFamilyInformation
    },
    {
        path: '/pms/pmi/insurancePanelInformation',
        name: 'PmsInsurancePanelInformation',
        component: PmsInsurancePanelInformation
    },
    {
        path: '/pms/pmi/registerNextofKin/:id',
        name: 'pmsPatientRegisterNextofKin',
        component: pmsPatientRegisterNextofKin
    },
    {
        path: '/pms/pmi/registerInsurance/:id',
        name: 'pmsPatientRegisterInsurance',
        component: pmsPatientRegisterInsurance
    },
    {
        path: '/pms/pmi/registerAppointment/:id',
        name: 'pmsPatientRegisterAppointment',
        component: pmsPatientRegisterAppointment
    },
    {
        path: '/pms/pmi/appointmentInformation',
        name: 'pmsPatientAppointmentInformation',
        component: pmsPatientAppointmentInformation
    },
    {
        path: '/pms/billing',
        name: 'pmsPatientBilling',
        component: pmsPatientBilling
    },
    {
        path: '/cis',
        name: 'cisIndex',
        component: cisIndex
    },
    {
        path: '/cis/consultation-history',
        name: 'cisConsultationHistory',
        component: cisConsultationHistory
    },
    {
        path: '/pis',
        name: 'pisIndex',
        component: pisIndex
    },
    {
        path: '/pis/create-medicine',
        name: 'pisCreateMeds',
        component: pisCreateMeds
    },
    {
        path: '/pis/create-prescription',
        name: 'pisCreatePrescription',
        component: pisCreatePrescription
    },
    {
        path: '/lt',
        name: 'ltIndex',
        component: ltIndex
    },
    {
        path: '/lt/type-of-case',
        name: 'ltTypeofCase',
        component: ltTypeofCase
    },
    {
        path: '/lt/role',
        name: 'ltRole',
        component: ltRole
    },
    {
        path: '/lt/insurance',
        name: 'ltInsurance',
        component: ltInsurance
    },
    {
        path: '/lt/medicine',
        name: 'ltMedicine',
        component: ltMedicine
    },
    {
        path: '/lt/staff',
        name: 'ltStaff',
        component: ltStaff
    },
    {
        path: '/icd10',
        name: 'icd10Index',
        component: icd10Index
    },
    {
        path: '/his/queue',
        name: 'queueIndex',
        component: queueIndex
    }
];
