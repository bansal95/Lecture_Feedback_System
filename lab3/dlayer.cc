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

#include "dlayer.h"

Define_Module(Dlayer);

D_PDU* lastm;
void Dlayer::initialize()
{
    down_in=gate("down_in");
    up_out=gate("up_out");
    up_in=gate("up_in");
    down_out=gate("down_out");
    id=par("id");
    timeoutEvent = new cMessage("timeoutEvent");
    sent=0;
    received=0;
}

void Dlayer::handleMessage(cMessage *msg)
{
    double timeout = 6.0;

    if(msg==timeoutEvent){
        send(lastm->dup(),down_out);
        scheduleAt(simTime()+timeout, timeoutEvent);
        sent++;
    }
    else if(msg->getArrivalGate()==up_in){
        received++;
        A_PDU* am = check_and_cast<A_PDU*>(msg);
        D_PDU* m = new D_PDU();
        m->setId(am->getId()%2);
        m->setSrc(am->getSrc());
        m->setDest(am->getDest());
        m->setMsg(*am);
        if (uniform(0, 1) < 0.3) {
            sendDelayed(m,2.0, down_out);
        }
        else{
            sendDelayed(m,1.0,down_out);
        }
        if (am->getType()=='d'){
            scheduleAt(simTime()+timeout, timeoutEvent);
            lastm = m;
        }
        sent++;
    }
    else{
        received++;
        D_PDU* am = check_and_cast<D_PDU*>(msg);
        A_PDU m = am->getMsg();
        A_PDU* pm = new A_PDU(m);
        if (uniform(0, 1) < 0.4) {
            sendDelayed(pm,2.0, up_out);
        }
        else{
            sendDelayed(pm,1.0,up_out);
        }
        sent++;
        if(pm->getType()=='a'){
           cancelEvent(timeoutEvent);
        }

    }
}
void Dlayer::refreshDisplay() const
{
    char buf[40];
    sprintf(buf, "rcvd: %d sent: %d", received, sent);
    getDisplayString().setTagArg("t", 0, buf);
}
