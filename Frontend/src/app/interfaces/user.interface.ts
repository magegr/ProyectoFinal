export interface User {
    id:        number;
    email:     string;
    roles:     string[];
    name:      string;
    surname1:  string;
    surname2:  null;
    phone:     null;
    active:    boolean;
    createdAt: Date;
}