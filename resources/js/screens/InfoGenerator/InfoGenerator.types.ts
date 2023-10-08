export type FakePerson = {
  firstName: string;
  lastName: string;
  fullName: string;
  address: string;
  city: string;
  zipCode: string;
  state: string;
  country: string;
  creditCard: {
    type: string;
    number: string;
    expirationDate: string;
    cvc: number;
  };
  banking: {
    IBAN: string;
  };
};
