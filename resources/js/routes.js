import PmsIndex from './components/pms/Index';
import pmsPatientRegister from './components/pms/registration/RegisterPatient';
import PmsPatientMasterIndex from './components/pms/pmi/PatientMasterIndex';
import PmsPatientBiodata from './components/pms/pmi/PatientBiodata';
import PmsSpouseFamilyInformation from './components/pms/pmi/SpouseFamilyInformation';
import PmsInsurancePanelInformation from './components/pms/pmi/InsurancePanelInformation';
import cisIndex from './components/cis/Index';
import cisConsultationHistory from './components/cis/ViewConsultation';
import pmsPatientRegisterNextofKin from './components/pms/registration/RegisterNextofKin';
import pmsPatientRegisterInsurance from './components/pms/registration/RegisterInsurance';
import pmsPatientRegisterAppointment from './components/pms/registration/RegisterAppointment';
import pmsPatientAppointmentInformation from './components/pms/pmi/AppointmentInformation';

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
        path: '/cis',
        name: 'cisIndex',
        component: cisIndex
    },
    {
        path: '/cis/consultation-history',
        name: 'cisConsultationHistory',
        component: cisConsultationHistory
    }
];
