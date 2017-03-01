//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Lesser General Public License for more details.
// 
// You should have received a copy of the GNU Lesser General Public License
// along with this program.  If not, see http://www.gnu.org/licenses/.
// 

#include "alayer.h"

char v= 'A';
Define_Module(Alayer);

void Alayer::initialize()
{
    in=gate("in");
    out=gate("out");
    id=par("id");
    sent=0;
    received=0;

    if(id==1){
        A_PDU* m = new A_PDU();
        m->setId(0);
        m->setType('d');
        m->setSrc(1);
        m->setDest(2);
        m->setValue(v);
        send(m,out);
        sent++;
    }
}

void Alayer::handleMessage(cMessage *msg)
{
    // TODO - Generated method body
    received++;
    counter=par("counter");
    A_PDU* am = check_and_cast<A_PDU*>(msg);
    if(am->getType()=='d'){
        A_PDU* m = new A_PDU();
        m->setId(am->getId());
        m->setType('a');
        m->setSrc(2);
        m->setDest(1);
        send(m,out);
        sent++;

    }
    else if(counter<26){

        A_PDU* m = new A_PDU();
        m->setId(am->getId()+1);
        m->setType('d');
        m->setSrc(1);
        m->setDest(2);
        m->setValue(v+am->getId()+1);
        send(m,out);
        sent++;
        par("counter") = counter+1;
    }
}

void Alayer::refreshDisplay() const
{
    char buf[40];
    sprintf(buf, "rcvd: %d sent: %d", received, sent);
    getDisplayString().setTagArg("t", 0, buf);
}
